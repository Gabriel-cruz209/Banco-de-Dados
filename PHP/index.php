<?php

echo"Olá Mundo";


?>

import mysql.connector

#connect to the Mysql server
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="senaisp",
    database="Atividade_Avaliativa"
)

cursor = conn.cursor()

# Run a query
cursor.execute("select * from users")