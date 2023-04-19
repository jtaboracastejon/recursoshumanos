Instrucciones para su despliegue 

clonar el repositorio
Abrir el espacio de trabajo en VSCODE

en la terminal ejecutar composer install

copiar el contenido de env.template a un nuevo archivo a crear llamado .env

en .env cambiar el nombre de la baseDeDatos a la que se desea usar

en la terminal del proyecto ejecutar php artisan key:generate

posterior php artisan migrate

posterior npm install

posterior npm run dev
