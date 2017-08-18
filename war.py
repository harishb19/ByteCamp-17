import smtplib
import sys
parameters=sys.argv
server=smtplib.SMTP('smtp.gmail.com',587)
server=starttls()
server.login("email","password")
msg= $b_id."Kept longer!"
server.sendmail("email",$email,msg)
server.quit()