<script setup>
import { ref } from 'vue';

const userData = ref(null);
const errorMessage = ref('');

const getUserData = async () => {
  const token = localStorage.getItem('auth_token');
  console.log(token)
  
  if (!token) {
    errorMessage.value = 'Token tidak ditemukan, Anda harus login terlebih dahulu!';
    return;
  }

  try {
    const response = await fetch('http://192.168.0.139:8000/api/me', {
      method: 'GET',
      headers: {
        'Authorization': `Bearer ${token}`, // Mengirim token di header
        'Content-Type': 'application/json',
      },
    });

    // Cek apakah response berhasil
    if (!response.ok) {
      throw new Error('Gagal mendapatkan data pengguna');
    }

    const data = await response.json();
    console.log(data)
    userData.value = data;  // Menyimpan data pengguna di state
  } catch (error) {
    errorMessage.value = error.message;
  }
};

// Panggil fungsi getUserData saat komponen dimuat
getUserData();
const logout = async () => {
    const token = localStorage.getItem('auth_token');
    if (!token) {
        errorMessage.value = 'Token tidak ditemukan, Anda harus login terlebih dahulu!';
        return;
    }

    // Menghapus token dari localStorage
    localStorage.removeItem('auth_token');
    
    // Redirect ke halaman login
    window.location.href = '/login';  // Bisa juga menggunakan router.push('/login') jika pakai Vue Router

    try {
        const response = await fetch('http://192.168.0.139:8000/api/logout', {
        method: 'POST',
        headers: {
            'Authorization': `Bearer ${token}`, // Mengirim token di header
            'Content-Type': 'application/json',
        },
        });

        // Cek apakah response berhasil
        if (!response.ok) {
        throw new Error('Gagal logout');
        }

        const data = await response.json();
        userData.value = data;  // Menyimpan data pengguna di state
    } catch (error) {
        errorMessage.value = error.message;
    }
};
</script>

<template>
  <div>
    <h1>User Data</h1>
    <!-- Tampilkan error jika ada -->
    <p v-if="errorMessage">{{ errorMessage }}</p>

    <!-- Tampilkan data pengguna jika ada -->
    <div v-if="userData">
      <pre>{{ userData }}</pre>
    </div>
    <button @click="logout">Logout</button>
  </div>
</template>
