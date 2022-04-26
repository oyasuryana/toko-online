# appTokoOnline
Contoh sederhana aplikasi toko online dengan codeignier 3

# User
User terdiri dari  3 actor yaitu

* Pengunjung, hanya boleh lihat-lihat cek detail kirim pesan, dan registrasi
* Pembeli, adalah pengunjung yang sudah registrasi
* Administrator, adalah pemilik toko

* User administrator oyasuryana@yahoo.com password 123
* User Pembeli silahkan membuat akun dengan melakukan pendaftaran

# Instalasi
Untuk instalasi berikut langkahnya :
1. buat database tokoku di mysql dengan phpmyadmin
2. import file tokoku.sql
3. Edit file database.php di folder application\config
    * edit bagian :
        'username' => 'user_sql',
	    'password' => '123',
    * menjadi :
    	'username' => 'root',
	    'password' => '',    
4. Edit file config.php  di folder application\config
    * edit bagian :
        $config['base_url'] = 'http://localhost/idWebHostBackUp/tokoku/';
    * menjadi :             
        $config['base_url'] = 'http://localhost/tokoku/';
5. Jalankan browser panggil URL http://localhost/tokoku/