from flask import Flask, redirect, render_template, request, url_for
from flask_mysqldb import MySQL


app = Flask(__name__)

app.config["TEMPLATES_AUTO_RELOAD"] = True

#Conexion a MYSQL
app.config['MYSQL_HOST']= 'localhost'
app.config['MYSQL_USER']= 'root'
app.config['MYSQL_PASSWORD']= ''
app.config['MYSQL_DB']= 'crud_albums'

app.secret_key = 'mysecretkey'

mysql = MySQL(app)

# RUTA PRINCIPAL :READ
@app.route('/guardar', methods=['POST'])
def guardar():
    if request.method == 'POST':
        titulo= request.form['txtTitulo']
        artista= request.form['txtArtista']
        anio= request.form['txtAnio']
        print(titulo,artista,anio)

        """CONEXION CON LA BD Y LA EJECUCION DEL INSERT"""
        con = mysql.connection.cursor()
        con.execute('INSERT INTO tb_alumns(titulo,artista,anio)) VALUES (%s,%s,%s)', (titulo, artista, anio))
        mysql.connection.commit()

    flash('El album fue agregado correctamente!')
    return redirect(url_for('index'))
    

#EJECUTAR APLICACION

if __name__ == '__main__':
    app.run(debug=True)

