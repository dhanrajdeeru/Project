from flask import Flask
from flask import render_template # to render our html page
from flask import request # to get user input from form
import hashlib # included in Python library, no need to install
import psycopg2 # for database connection
import json

app = Flask(__name__)

@app.route("/")

@app.route("/login", methods=["POST"])

def login():
    # get user input from the html form
    id = request.form['id']
    pass = request.form['pass']

    # hash the password they entered
    #t_hashed = hashlib.sha256(t_password.encode())
    #t_password = t_hashed.hexdigest()

    try:
	# database connection
	host = "webhosting.chl5i1ohnieu.us-west-2.rds.amazonaws.com"
    	port = "5432"
    	dbname = "PURPLETEAMING"
    	user = "webadmin"
    	pw = "webadminpassword"
    	db_conn = psycopg2.connect(database=dbname, user=user, password=pw, host=host, port=port)
    	db_cursor = db_conn.cursor()

    # Get user ID from PostgreSQL users table
    	s = ""
    	if len(id) == 5:
    		s += "SELECT UID FROM LOGIN"
		t=0
    	else:
		s += "SELECT EMAIL FROM LOGIN"
		t=1	
   
    	db_cursor.execute(s)
    	res=db_cursor.fetchall()
    	if id in res:
		s += "SELECT PASSWORDS FROM LOGIN"
    		s += " WHERE"
    		s += " ("
		if t:
    			s += " id='" + EMAIL + "'"
		else:
			s += " id='" + UID + "'"
    		s += " )"
		db_cursor.execute(s)
    		res=db_cursor.fetchall()
		if res == pass:
			txt="Login Successful"
			return render_template('profile.html',txt=txt)
		else:
			txt="Invalid Password"
			return render_template('maimpage.html',txt=txt)
	else:
		txt="Invalid Email or UID"
		return render_template('maimpage.html',txt=txt)
	
    except psycopg2.Error as e:
        return jsonify({'error':e})