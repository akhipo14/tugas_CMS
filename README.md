Nama : Rafli haikal
Asal Kampus : Politeknik Negeri Padang

catatan:
jalankan perintah : 
- php artisan storage:link --> untuk gambar biar bisa di upload di public
- php artisan migrate:fresh --seed -> karena ada database seeder yang saya buat, optional saja, supaya tidak lama melakukan insert di kategori dan product, dan di product, gambarnya emang blum ada, karena blum di insert ,, baiknya untuk product di insert manual saja, atau diupdate pada data yang sudah ada

tambahkan FILESYSTEM_DISK= public di file 'env.' paling bawah