# 📔 MyDiary

MyDiary adalah aplikasi web berbasis **Laravel** yang memungkinkan pengguna untuk menulis catatan harian secara aman, rapi, dan terstruktur.  
Aplikasi ini dilengkapi dengan fitur **subscription** berbayar, **masa trial 20 hari**, serta pencatatan mood harian.

---

## ✨ Fitur Utama

- 📝 **Diary Harian** – Simpan catatan harian dengan dukungan banyak entri dalam satu hari.  
- 😊 **Mood Tracking** – Tandai setiap entri dengan mood (senang, sedih, bingung, dll).  
- 🔑 **Autentikasi & Registrasi** – Sistem login & register dengan proteksi akun.  
- 💳 **Subscription & Trial** – Masa trial 20 hari, lanjut dengan paket berlangganan bulanan.  
- 📅 **Riwayat Entri** – Lihat kembali catatan lama dengan filter tanggal.  
- ⚡ **Full Laravel Stack** – Menggunakan Laravel Migration, Eloquent, Middleware, dll.  

---

## 🗂️ Struktur Database (Migrasi)

- **users** – data pengguna  
- **diary_entries** – entri catatan harian  
- **subscriptions** – status berlangganan per user  
- **subscription_plans** – daftar paket langganan  
- **payments** – catatan pembayaran  

---

## 🚀 Instalasi

1. Clone repositori:
   ```bash
   git clone https://github.com/username/mydiary.git
   cd mydiary
