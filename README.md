# Tugas 1 IF3110 Pengembangan Aplikasi Berbasis Web

# === Kelompok The Freelancers ===

Farhan Amin / 13515043 <br>
Stevanno Hero Leadervand / 13515082 <br>
Gianfranco Fertino Hwandiano / 13515118

## About

Ini adalah aplikasi *ojek online* **berbasis web** yang memungkinkan seorang pengguna untuk menjadi penumpang dan/atau driver ojek online. Untuk menggunakan aplikasi ini, seorang pengguna harus melakukan login. Pengguna dapat menjadi penumpang maupun driver pada akun yang sama. Untuk menjadi driver, pengguna harus mengaktifkan opsi menjadi driver pada profilnya.

## Tools

1. Untuk backend, wajib menggunakan **PHP** tanpa framework apapun. Harap diperhatikan, Anda harus mengimplementasikan fitur menggunakan HTTP method yang tepat.
2. Gunakan **MySQL** untuk menyimpan data.
3. Untuk frontend, gunakan Javascript, HTML dan CSS. **Tidak boleh** menggunakan library atau framework CSS atau JS seperti JQuery atau Bootstrap. CSS sebisa mungkin ada di file yang berbeda dengan PHP (tidak inline styling).


### Login

![alt text](https://i.imgur.com/WmHxvd5.jpg)

Pengguna dapat melakukan login sebagai user. Login hanya membandingkan username dan password saja, dan tidak perlu proteksi apapun. Halaman ini merupakan halaman pertama yang dibuka oleh pengguna ketika menjalankan aplikasi. Tidak ada proses otentikasi apakah pengguna sudah login atau belum dalam page lainnya. Identitas pengguna yang sedang login diberikan melalui HTTP GET pada URL (sebagai contoh: /profile.php?id_active=2 menandakan bahwa pengguna yang sedang login memiliki id pengguna = 2).

### Register

![](https://i.imgur.com/sO3exk8.jpg)

Pengguna dapat mendaftarkan diri sebagai user agar dapat menggunakan aplikasi ini. Satu user akan memiliki satu akun yang dapat digunakan sebagai penumpang maupun sebagai driver. User disediakan opsi untuk memilih apakah dia mau menjadi driver atau tidak saat registrasi. Anda harus melakukan validasi bahwa email dan username yang sama tidak boleh digunakan untuk dua kali mendaftar. **Validasi email dan username dilakukan menggunakan AJAX**. Jika email dan username valid akan ditandai dengan lambang centang seperti pada gambar. Setelah selesai register, jika pengguna tidak memilih opsi untuk menjadi driver, pengguna otomatis masuk ke halaman Order dengan keadaan sudah login. Jika pengguna memilih opsi menjadi driver, pengguna otomatis masuk ke halaman Profile dengan keadaan sudah login.

### Profile

![alt text](https://i.imgur.com/LCD4gyM.jpg)

Pada halaman ini, ditampilkan username, nama lengkap, email, dan nomor HP. Selain itu, ditampilkan keterangan apakah pengguna merupakan driver atau bukan. Jika pengguna merupakan driver, ditampilkan tulisan Driver diikuti rating dan jumlah vote seperti terlihat pada gambar. Jika pengguna bukan driver, ditampilkan tulisan Non-Driver, tanpa diikuti rating. Pada bagian kanan atas, terdapat tombol edit, jika pengguna menekan tombol tersebut, pengguna dibawa ke halaman Edit-Profile.

Pada bagian bawah, terdapat Preferred Location, yang berisi daftar lokasi yang dilayani pengguna jika berperan sebagai driver. Bagian ini ditampilkan jika pengguna merupakan driver. Pada bagian kanan atas, terdapat tombol edit, jika pengguna menekan tombol tersebut, pengguna dibawa ke halaman Edit-Preferred-Location.

### Edit-Profile

![alt text](https://i.imgur.com/TIF5YnW.jpg)

Pada halaman ini, pengguna dapat mengedit nama yang ditampilkan, nomor telepon, foto, dan status driver.

Status driver berupa tombol Yes/No yang dapat diklik oleh pengguna untuk mengganti. Tombol Yes/No dapat berupa sekedar tulisan Yes dan No yang berubah saat ditekan. Pada saat tombol Yes/No ditekan, page tidak boleh refresh. Tulisan Yes dan No harus berbeda warna.

### Edit-Preferred-Location

![alt text](https://i.imgur.com/zaPVjdU.jpg)

Pada Edit-Preferred-Location, ditampilkan lokasi-lokasi yang dapat dicapai jika menjadi driver. Pada tiap baris lokasi, ada tombol Delete. Jika tombol tersebut ditekan, akan tampil konfirmasi untuk delete, menggunakan Javascript. Setelah Delete, halaman akan refresh.

Pada bagian Add New Location, terdapat sebuah text area dan sebuah tombol Add. Pada text area, pengguna dapat mengisikan lokasi untuk ditambahkan. Ketika tombol Add ditekan, alamat tersebut ditambahkan pada preferred location pengguna, dan halaman refresh.

Jika tombol Back ditekan, pengguna dibawa kembali ke halaman Profile.


### Order-Ojek

![alt text](https://i.imgur.com/K08ANDk.jpg)

Order-Ojek merupakan halaman utama yang ditampilkan ketika user telah login. Pada halaman Order-Ojek, terdapat sebuah form yang dapat diisi pengguna untuk melakukan order.

Perlu diperhatikan, tulisan di atas tombol logout memiliki format "Hi, username!". Selanjutnya, terdapat menu bar yang menampilkan 3 menu utama seperti pada gambar. Menu yang sedang dibuka diberikan warna background yang berbeda sebagai penanda halaman apa yang sedang dibuka pengguna.

Setelah pengguna mengisi field-field pada form order dan menekan tombol order, pengguna akan dibawa ke halaman Select-Driver. Perlu diperhatikan bahwa seluruh field wajib diisi, kecuali field "Preferred Driver". Pada field Preferred Driver, terdapat Placeholder "(optional)"

### Select-Driver

![alt text](https://i.imgur.com/CQVruDA.jpg)

Pada halaman ini, ditampilkan driver-driver yang tersedia dan dapat mengambil order. Driver yang dapat mengambil order adalah pengguna yang menjadi driver, dan memiliki alamat asal *atau* alamat tujuan pada "Preferred Location"-nya.

Halaman ini terdiri atas dua bagian, yaitu "Preferred Driver" dan "Other Drivers". Bagian "Preferred Driver" akan terisi dengan driver-driver dengan nama yang diisikan pengguna pada field "Preferred Driver" saat melakukan order. Jika pengguna tidak mengisikan field "Preferred Driver" atau tidak ada driver dengan nama yang diisikan pada field "Preferred Driver", bagian Preferred Driver akan kosong.

Pada bagian "Other Drivers", ditampilkan seluruh driver yang dapat mengambil order tersebut.

Perlu diperhatikan, pada setiap driver, terdapat foto, nama, dan rating driver tersebut. Rating dituliskan dengan format: Rating rata-rata (jumlah orang yang memberikan rating).

Setelah memilih driver dan menekan tombol Confirm, pengguna dibawa ke halaman Complete-Order.

### Complete-Order

![alt text](https://i.imgur.com/iEodrTJ.jpg)

Pada halaman Complete-Order, akan ditampilkan informasi driver dan order, serta opsi untuk memberikan rating dan komentar. Setelah pengguna submit rating dan komentar untuk driver, pengguna dibawa ke halaman Order-Ojek.


### History

![alt text](https://i.imgur.com/YbKX2lb.jpg)

Pada halaman history, terdapat dua tab, yaitu History Penumpang dan History Driver. History Penumpang menampilkan daftar order yang pernah diambil pengguna sebagai penumpang, dan History Driver menampilkan daftar order yang pernah diambil pengguna sebagai driver.

Pada tiap entri pada history, terdapat tombol hide. Jika tombol hide ditekan, history yang bersangkutan tidak akan ditampilkan, tapi tidak dihapus.


### Pembagian Tugas
*Disarankan semua anggota kelompok mengerjakan tampilan dan fungsionalitasnya. Bukan hanya tampilan atau fungsionalitasnya saja*

**Tampilan**
1. Login : 13515043, 13515082
2. Register : 13515043, 13515082
3. Select Destination : 13515118
4. Select a driver : 13515118
5. Complete your order : 13515118
6. History : 13515043, 13515118
7. My profile : 13515082
8. Edit Profile : 13515082
9. Edit Pref location : 13515118

**Fungsionalitas**
1. Login : 13515043
2. Register : 13515043
3. Select Destination : 13515118
4. Select a driver : 13515118
5. Complete your order : 13515118
6. History : 13515043, 13515118
7. My profile : 13515082
8. Edit Profile : 13515082
9. Edit Pref location : 13515118

