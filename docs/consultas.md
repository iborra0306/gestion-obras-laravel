# 6.4. Constructor de consultas

Datos: `php artisan migrate:fresh --seed` (demostración de 6.3).

## 1. Consultas de negocio (`DB::table()`)

### 1.1 Obras con el nombre completo de su cliente, ordenadas por código

**Código:**

```php
DB::table('obras')
    ->join('clientes', 'clientes.id', '=', 'obras.cliente_id')
    ->select('obras.codigo', 'clientes.nombre', 'clientes.apellidos')
    ->orderBy('obras.codigo')
    ->get();
```

**SQL generado** (`->toRawSql()`):

```sql
select `obras`.`codigo`, `clientes`.`nombre`, `clientes`.`apellidos` from `obras` inner join `clientes` on `clientes`.`id` = `obras`.`cliente_id` order by `obras`.`codigo` asc;
```

**Ejemplo de resultado:**

```shell
= Illuminate\Support\Collection {#7746
    all: [
      {#7742
        +"codigo": "OBR0001",
        +"nombre": "Aurora",
        +"apellidos": "Fernández",
      },
      {#7747
        +"codigo": "OBR0002",
        +"nombre": "Gerard",
        +"apellidos": "Escalante",
      },
      {#7734
        +"codigo": "OBR0003",
        +"nombre": "Salma",
        +"apellidos": "Salgado",
      },
    ],
  }
```

### 1.2 Total cobrado por obra, de mayor a menor

**Código:**
```php
DB::table('ingresos')
  ->selectRaw('obra_id, SUM(importe) as total')
  ->groupBy('obra_id')
  ->orderByDesc('total')
  ->get();
```
**SQL generado:**
```sql
select obra_id, SUM(importe) as total from `ingresos` group by `obra_id` order by `total` desc;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7687
    all: [
      {#7772
        +"obra_id": 5,
        +"total": "7936.81",
      },
      {#7712
        +"obra_id": 20,
        +"total": "7452.67",
      },
      {#7682
        +"obra_id": 13,
        +"total": "6990.46",
      },
    ],
  }
```

### 1.3 Obras sin ningún ingreso

**Código:**
```php
DB::table('obras')
  ->leftJoin('ingresos', 'ingresos.obra_id', '=', 'obras.id')
  ->select('obras.codigo')
  ->whereNull('importe')
  ->get();
```
**SQL generado:**
```sql
select `obras`.`codigo` from `obras` left join `ingresos` on `ingresos`.`obra_id` = `obras`.`id` where `importe` is null;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7972
    all: [
      {#7967
        +"codigo": "OBR0001",
      },
      {#7984
        +"codigo": "OBR0003",
      },
      {#7691
        +"codigo": "OBR0006",
      },
    ],
  }
```

### 1.4 Horas y coste de mano de obra por trabajador (los 5 con más horas)

**Código:**
```php
DB::table('lineas_parte_trabajo')
  ->selectRaw('trabajador_id, SUM(horas) as total_horas, SUM(coste_hora * horas) as total_coste_moo')
  ->groupBy('trabajador_id')
  ->orderByDesc('total_horas')
  ->limit(5)
  ->get();
```
**SQL generado:**
```sql
select trabajador_id, SUM(horas) as total_horas, SUM((coste_hora * horas)) as total_coste_moo from `lineas_parte_trabajo` group by `trabajador_id` order by `total_horas` desc limit 5;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7879
    all: [
      {#7883
        +"trabajador_id": 20,
        +"total_horas": "75.00",
        +"total_coste_moo": "1500.0000",
      },
      {#7880
        +"trabajador_id": 13,
        +"total_horas": "61.00",
        +"total_coste_moo": "1220.0000",
      },
      {#7985
        +"trabajador_id": 11,
        +"total_horas": "60.00",
        +"total_coste_moo": "1200.0000",
      },
      {#7954
        +"trabajador_id": 5,
        +"total_horas": "55.00",
        +"total_coste_moo": "1100.0000",
      },
      {#7990
        +"trabajador_id": 1,
        +"total_horas": "52.00",
        +"total_coste_moo": "1040.0000",
      },
    ],
  }
```

### 1.5 Gasto en proveedores por proveedor y año

**Código:**
```php
DB::table('partes_proveedor')
  ->selectRaw('proveedor_id, SUM(importe) as total_gasto, YEAR(fecha) as año')
  ->groupBy('proveedor_id', 'año')
  ->orderBy('proveedor_id')
  ->orderBy('año')
  ->get()
```
**SQL generado:**
```sql
select proveedor_id, SUM(importe) as total_gasto, YEAR(fecha) as año from `partes_proveedor` group by `proveedor_id`, `año` order by `proveedor_id` asc, `año` asc;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7929
    all: [
      {#7861
        +"proveedor_id": 1,
        +"total_gasto": "3631.36",
        +"año": 2026,
      },
      {#7966
        +"proveedor_id": 2,
        +"total_gasto": "656.57",
        +"año": 2026,
      },
      {#7705
        +"proveedor_id": 3,
        +"total_gasto": "1072.91",
        +"año": 2026,
      },
    ],
  }
```

### 1.6 Presupuestos aprobados por año, con su número

**Código:**
```php
DB::table('presupuestos')
  ->selectRaw('YEAR(fecha) as año, COUNT(*) as total_presupuestos')
  ->where('estado', '=', 'aprobado')
  ->groupBy('año')
  ->orderBy('año')
  ->get();
```
**SQL generado:**
```sql
select YEAR(fecha) as año, COUNT(*) as total_presupuestos from `presupuestos` where `estado` = 'aprobado' group by `año` order by `año` asc;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7709
    all: [
      {#7951
        +"año": 2025,
        +"total_presupuestos": 2,
      },
      {#7739
        +"año": 2026,
        +"total_presupuestos": 18,
      },
    ],
  }

```

### 1.7 Obras con gasto externo (proveedores + especialistas) > 1 000 €, con `having`

**Código:**
```php
$prov = DB::table('partes_proveedor')
  ->selectRaw('obra_id, SUM(importe) as total_proveedor')
  ->groupBy('obra_id');

$esp = DB::table('partes_especialista')
->selectRaw('obra_id, SUM(importe) as total_especialista')
->groupBy('obra_id');

DB::table('obras as o')
  ->joinSub($prov, 'p', 'p.obra_id', '=', 'o.id')
  ->joinSub($esp, 'e', 'e.obra_id', '=', 'o.id')
  ->selectRaw('o.id, o.codigo, p.total_proveedor, e.total_especialista')
  ->groupBy('o.id', 'o.codigo', 'p.total_proveedor', 'e.total_especialista')
  ->havingRaw('(p.total_proveedor + e.total_especialista) > 1000')
  ->get();
```
**SQL generado:**
```sql
select obra_id, SUM(importe) as total_proveedor from `partes_proveedor` group by `obra_id`;
select obra_id, SUM(importe) as total_especialista from `partes_especialista` group by `obra_id`;
select o.id, o.codigo, p.total_proveedor, e.total_especialista
from `obras` as `o`
  inner join (
    select obra_id, SUM(importe) as total_proveedor 
    from `partes_proveedor`
    group by `obra_id`
  ) as `p` on `p`.`obra_id` = `o`.`id` 
  inner join (
    select obra_id, SUM(importe) as total_especialista 
    from `partes_especialista`
    group by `obra_id`
  ) as `e` on `e`.`obra_id` = `o`.`id`
group by `o`.`id`, `o`.`codigo`, `p`.`total_proveedor`, `e`.`total_especialista`
having (p.total_proveedor + e.total_especialista) > 1000;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#8076
    all: [
      {#8070
        +"id": 2,
        +"codigo": "OBR0002",
        +"total_proveedor": "630.54",
        +"total_especialista": "1702.47",
      },
      {#8071
        +"id": 3,
        +"codigo": "OBR0003",
        +"total_proveedor": "841.50",
        +"total_especialista": "1202.15",
      },
      {#8069
        +"id": 5,
        +"codigo": "OBR0005",
        +"total_proveedor": "3227.31",
        +"total_especialista": "836.71",
      },
    ],
  }
```

### 1.8 Ingresos del mes en curso

**Código:**
```php
DB::table('ingresos')
  ->selectRaw('SUM(importe) as total_ingresos')
  ->whereMonth('fecha', now()->month)
  ->whereYear('fecha', now()->year)
  ->get();
```
**SQL generado:**
```sql
select SUM(importe) as total_ingresos from `ingresos` where month(`fecha`) = '11' and year(`fecha`) = 2026;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7966
    all: [
      {#7967
        +"total_ingresos": "4057.38",
      },
    ],
  }

```

### 1.9 Trabajadores con alguna `baja_medica` en el último año

**Código:**
```php
DB::table('faltas')
  ->select('trabajador_id')
  ->where('tipo', 'baja_medica')
  ->where('fecha_inicio', '>=', now()->subYear())
  ->groupBy('trabajador_id')
  ->get();
```
**SQL generado:**
```sql
select `trabajador_id` from `faltas` where `tipo` = 'baja_medica' and `fecha_inicio` >= '2025-11-16 17:24:12' group by `trabajador_id`;
```
**Ejemplo de resultado:**
```shell
= Illuminate\Support\Collection {#7752
    all: [
      {#7751
        +"trabajador_id": 2,
      },
      {#7748
        +"trabajador_id": 5,
      },
      {#7750
        +"trabajador_id": 6,
      },
      {#7746
        +"trabajador_id": 9,
      },
    ],
  }
```