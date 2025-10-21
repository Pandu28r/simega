<template>
  <div class="login-wrapper">
    <slot></slot>
  </div>
</template>

<script setup>
    const setFullHeight = () => {
    const vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    };

    window.addEventListener('resize', setFullHeight);
    setFullHeight();
</script>

<style scoped>
  .login-wrapper {
    width: 100%;
    height: calc(var(--vh, 1vh) * 100);
    background-size: cover;
    background-position: left 70%;
    background-repeat: no-repeat;
    background-image: url('/images/bg-login-laptop.png');
  }

  @media (max-width: 768px) {
    .login-wrapper {
      background-position: left 40%;
    }
  }

  @media (max-width: 576px) {
    .login-wrapper {
      width: 100%;
      height: calc(var(--vh, 1vh) * 100);
      background-image: url('/images/bg-login-mobile.png');
      background-position: center 40%;
    }
  }
</style>
