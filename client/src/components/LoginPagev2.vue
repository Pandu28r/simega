<template>
    <BackgroundLogin>
        <div>
            <!-- Logo Section -->
            <div class="card-header logo-section text-center border-0">
              <div class="d-flex align-items-center justify-content-center gap-3 mb-2">
                <div class="logo">
                  <img :src="logo" alt="logo" />
                </div>
              </div>
            </div>

            <!-- Form Section -->
            <div class="card-body form-section">
              
              <!-- Username Input -->
              <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text bg-light border-0">
                    <i class="bi bi-person-fill text-purple"></i>
                  </span>
                  <input
                    v-model="username"
                    type="text"
                    class="form-control form-control-lg border-0"
                    placeholder="Username"
                    @keyup.enter="handleLogin"
                  />
                </div>
              </div>

              <!-- Password Input -->
              <div class="mb-4">
                <div class="input-group">
                  <span class="input-group-text bg-light border-0">
                    <i class="bi bi-lock-fill text-purple"></i>
                  </span>
                  <input
                    v-model="password"
                    type="password"
                    class="form-control form-control-lg border-0"
                    placeholder="Password"
                    @keyup.enter="handleLogin"
                  />
                </div>
              </div>

              <!-- Sign In Button -->
              <div class="text-center">
                <button 
                  @click="handleLogin" 
                  class="btn btn-primary btn-lg px-5 sign-in-btn"
                >
                  Sign In
                </button>
              </div>

            </div>
        </div>
    </BackgroundLogin>
    
</template>

<script setup>
    import { ref } from 'vue';
    import logo from '/images/logo-login-v4.png';
    import BackgroundLogin from './BackgroundLogin.vue';
    import 'bootstrap-icons/font/bootstrap-icons.css';
    import { useRouter } from 'vue-router'

    const username = ref('')
    const password = ref('')
    const token = localStorage.getItem('auth_token');

    const router = useRouter()
    
    const redirectToHome = () => {
        router.push('/')
    }
    console.log(token)
    if(token){
        redirectToHome()    
    }

    const handleLogin = async () => {
        if (!username.value || !password.value) {
            alert('Username dan Password harus diisi!')
            return
        }
    
        try {
            const response = await fetch('http://192.168.0.139:8000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'applicant/json',
                },
                body: JSON.stringify({
                    email: username.value,
                    password: password.value
                }),
            })

            if (!response.ok) {
                throw new Error('Login Gagal')
            }

            const data = await response.json()

            if (data.success && data.token) {
                localStorage.setItem('auth_token', data.token)

                alert('Login berhasil!')
                console.log('Response:', data)
                redirectToHome()
            } else {
                alert('Login gagal!')
            }
        
        } catch(error) {
            console.error('Login error:', error)
            alert('Terjadi kesalahan saat login. Coba lagi nanti.')
        }
    }
</script>

<style scoped>
    .logo {
        width: 400px;
        margin: 9% auto 0;
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    .form-section {
        padding: 0 25% !important;
        margin-top: 10%;
    }

    .input-group {
        border-radius: 16px !important;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
    }

    .input-group-text {
        border: none !important;
        background: #EBE0FF !important;
        padding: 0.75rem 1rem;
    }

    .input-group-text span {
        padding-right: 10;
        margin-right: 0px;
    }

    .input-group .form-control {
        background: #EBE0FF !important;
    }

    .form-control {
        background: #EBE0FF !important;
        border: none !important;
        padding: 0.75rem 1rem !important;
        color: #581c87 !important;
        font-size: 1rem !important;
    }

    .sign-in-btn {
        background: #e9d5ff !important;
        border: none !important;
        color: #581c87 !important;
        font-weight: 600 !important;
        border-radius: 50px !important;
        padding: 0.625rem 3rem !important;
        box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2) !important;
        transition: all 0.3s ease !important;
        font-size: 15px;
    }

    .sign-in-btn:hover {
        background: #f3e8ff !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3) !important;
        color: #581c87 !important;
    }

    .sign-in-btn:active {
        transform: translateY(0);
    }

    @media (max-width: 1500px) {
        .form-section {
            margin-top: 15%;
        }
    }

    @media (max-width: 1320px) {
        .form-section {
            margin-top: 20%;
        }
    }

    @media (max-width: 1024px) {
        .form-section {
            padding: 1.5rem 15% 3rem !important;
            margin-top: 30%;
        }
    }

    @media (max-width: 768px) {

        .form-section {
            padding: 1.5rem 4rem 3rem !important;
            margin-top: 33%;
        }

    }

    @media (max-width: 576px) {

        .form-section {
            padding: 1.5rem 4rem 3rem !important;
            margin-top: 50%;
        }
    }

</style>