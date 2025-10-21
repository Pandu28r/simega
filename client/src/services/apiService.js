// apiService.js
export const fetchUserData = async () => {
    const token = localStorage.getItem('auth_token')

    if (!token) {
        alert('Anda harus login terlebih dahulu!')
        return
    }

    try {
        const response = await fetch('http://localhost:8000/api/me', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json',
            },
        })

        if (!response.ok) {
            throw new Error('Gagal mengambil data pengguna')
        }

        const data = await response.json()

        console.log('Data Pengguna:', data)
        return data
    } catch (error) {
        console.error('Error:', error)
        alert('Terjadi kesalahan saat mengambil data pengguna')
    }
}
