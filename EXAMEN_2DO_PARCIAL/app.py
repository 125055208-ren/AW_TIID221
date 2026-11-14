
from flask import Flask, flash, redirect, render_template, request, url_for
from flask_mysqldb import MySQL


app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True


app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'crud_tareas'

app.secret_key = 'mysecretkey'


mysql = MySQL(app)


@app.route('/')
def index():
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_tareas ORDER BY fecha_limite ASC')
    conTareas = con.fetchall()
    con.close()
    return render_template('index.html', listTareas=conTareas)


@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method == 'POST':
        titulo = request.form['txtTitulo']
        descripcion = request.form['txtDescripcion']
        fecha = request.form['txtFecha']
        prioridad = request.form['selPrioridad']
        estado = request.form['selEstado']

        con = mysql.connection.cursor()
        con.execute(
            'INSERT INTO tb_tareas(titulo, descripcion, fecha_limite, prioridad, estado) '
            'VALUES(%s,%s,%s,%s,%s)',
            (titulo, descripcion, fecha, prioridad, estado))
        mysql.connection.commit()
        con.close()

    flash('La tarea fue agregada correctamente!')
    return redirect(url_for('index'))



@app.route('/editar/<int:id>')
def editar(id):
    con = mysql.connection.cursor()
    con.execute('SELECT * FROM tb_tareas WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('editarTarea.html', Tarea=consultarId)



@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    if request.method == 'POST':
        titulo = request.form['txtTitulo']
        descripcion = request.form['txtDescripcion']
        fecha = request.form['txtFecha']
        prioridad = request.form['selPrioridad']
        estado = request.form['selEstado']

        con = mysql.connection.cursor()
        con.execute(
            'UPDATE tb_tareas SET titulo=%s, descripcion=%s, fecha_limite=%s, '
            'prioridad=%s, estado=%s WHERE id=%s',
            (titulo, descripcion, fecha, prioridad, estado, id))
        mysql.connection.commit()
        con.close()

    flash('Se actualizó la tarea: ' + titulo)
    return redirect(url_for('index'))



@app.route('/eliminar/<int:id>', methods=['GET', 'POST'])
def eliminar(id):
    con = mysql.connection.cursor()
    if request.method == 'POST':
        titulo = request.form['txtTitulo']
        con.execute('DELETE FROM tb_tareas WHERE id=%s', (id,))
        mysql.connection.commit()
        con.close()
        flash('Se eliminó la tarea: ' + titulo)
        return redirect(url_for('index'))

    con.execute('SELECT * FROM tb_tareas WHERE id=%s', (id,))
    consultarId = con.fetchone()
    con.close()
    return render_template('eliminarTarea.html', Tarea=consultarId)



if __name__ == '__main__':
    app.run(debug=True)
