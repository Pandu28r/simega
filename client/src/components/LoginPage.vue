<template>
  <div class="login-wrapper">
    <div class="container">
      <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4">
          
          <div class="card login-card shadow-lg border-0" :style="{ backgroundImage: `url(${backgroundImage})` }">
            
            <!-- Logo Section -->
            <div class="card-header logo-section text-center border-0">
              <div class="d-flex align-items-center justify-content-center gap-3 mb-2">
                <div class="logo">
                  <img :src="logo" alt="logo" />
                </div>
                <h1 class="logo-text mb-0">SiMEGA</h1>
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

        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import logo from '@/assets/images/logo.png'
import backgroundImage from '@/assets/images/bg-login.jpg';

const username = ref('')
const password = ref('')

const handleLogin = () => {
  if (!username.value || !password.value) {
    alert('Username dan Password harus diisi!')
    return
  }
  
  console.log('Login:', { username: username.value, password: password.value })
  alert(`Login dengan username: ${username.value}`)
  
  // Contoh redirect ke dashboard (uncomment jika sudah setup router)
  // import { useRouter } from 'vue-router'
  // const router = useRouter()
  // router.push('/dashboard')
}
</script>

<style scoped>
/* Import Bootstrap Icons */
@import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css');

.login-wrapper {
  background: linear-gradient(135deg, #EBE0FF 0%, #EBE0FF 100%);
  min-height: 100vh;
}

.login-card {
  border-radius: 1.5rem !important;
  overflow: hidden;
  background: linear-gradient(to bottom, #EBE0FF 0%, #EBE0FF 40%, #532E99 100%);
  height: 90vh;
}

/* Logo Section */
.logo-section {
  background: #EBE0FF !important;
  padding: 3rem 2rem 2rem !important;
}

.logo {
  width: 100px;
  height: 100px;
  margin-top: 20px;
  background: #EBE0FF;
  border-radius: 0.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #f3e8ff;
}

.logo img {
  width: 200%;
}

.logo-text {
  font-size: 1.8rem;
  font-weight: 900;
  margin-top: 25px;
  margin-left: -10px;
  color: #371774ff;
  letter-spacing: 2px;
  font-family: 'Poppins', sans-serif;
  letter-spacing: 0px;
  
}

/* Wave Effect */
.wave-container {
  position: relative;
  height: 6rem;
  background: #EBE0FF;
  overflow: hidden;
}

.wave-svg {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 100%;
}

/* Form Section */
.form-section {
  background: #532E99 !important;
  padding: 1.5rem 2rem 3rem !important;
}

/* Input Styling */
.input-group {
  border-radius: 50px !important;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.input-group-text {
  background: #f3e8ff !important;
  border: none !important;
  padding: 0.75rem 1rem;
}

.text-purple {
  color: #7c3aed !important;
}

.form-control {
  background: #f3e8ff !important;
  border: none !important;
  padding: 0.75rem 1rem !important;
  color: #581c87 !important;
  font-size: 1rem !important;
}

.form-control::placeholder {
  color: #a78bfa !important;
}

.form-control:focus {
  background: #f3e8ff !important;
  box-shadow: 0 0 0 3px rgba(216, 180, 254, 0.4) !important;
  color: #581c87 !important;
}

/* Button Styling */
.sign-in-btn {
  background: #e9d5ff !important;
  border: none !important;
  color: #581c87 !important;
  font-weight: 600 !important;
  border-radius: 50px !important;
  padding: 0.625rem 3rem !important;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.2) !important;
  transition: all 0.3s ease !important;
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

/* Responsive */
@media (max-width: 576px) {
  .logo-text {
    font-size: 1.5rem;
  }
  
  .logo {
    width: 50px;
    height: 50px;
  }
  
  .logo i {
    font-size: 1.5rem !important;
  }
  
  .form-section {
    padding: 1rem 1.5rem 2rem !important;
  }
}
</style>