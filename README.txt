# GuideTouristOnline

No olvidar que, como lo indica el manual de operación, luego de instalar apache, php, mysql, composer y librerías del api para php se debe colocar la variable de entorno del json que contiene la autentiación para usar el api. En windows:
1)Abrir powerShell
2)En powerShell escribir:
  2.1) cd c:\apache24\bin
  2.2) $env:GOOGLE_APPLICATION_CREDENTIALS="ruta_local\authentication_api-php.json"
  2.3) .\httpd
