# EXAMEN 2DO PARCIAL: CRUD de Gestor de Tareas (Flask + MySQL)

## Requisitos
```
pip install flask flask-mysqldb
```

## Base de datos
Importa `schema.sql` en phpMyAdmin (o en la consola de MySQL). Crea la base `crud_tareas` y la tabla `tb_tareas`.

## Ejecutar
```
cd EXAMEN_2DO_PARCIAL
flask --app app.py run
```
Abre http://127.0.0.1:5000/

## Estructura
```
EXAMEN_2DO_PARCIAL/
├── app.py
├── schema.sql
└── templates/
    ├── index.html
    ├── editarTarea.html
    └── eliminarTarea.html
```

## Antes de entregar
1. Hacer commit.
2. Tomar captura del resultado en el navegador.
3. Subir todo a Classroom.
