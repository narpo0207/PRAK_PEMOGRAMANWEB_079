<script setup>
// Tidak ada script khusus di sini
</script>

<template>
  <div style="background-color: var(--background-color); color: var(--text-color);">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: var(--background-color);">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand" style="color: var(--text-color);">InterFams</router-link>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/projects" class="nav-link" active-class="active" style="color: var(--text-color);">Projects</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/orders" class="nav-link" active-class="active" style="color: var(--text-color);">Order</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Router View to display the selected page -->
    <div class="container mt-4">
      <router-view />
    </div>

    <!-- Button Example -->
    <div class="text-center mt-4">
      <button class="btn" style="background-color: var(--button-background-color); color: var(--button-text-color);">Click Me</button>
    </div>
  </div>
</template>

<style scoped>
:root {
  --background-color: #f5f5dc; /* Cream */
  --text-color: #242424;       /* Dark text */
  --button-background-color: #8b4513; /* Brown */
  --button-text-color: #ffffff; /* White */
}

.navbar {
  margin-bottom: 20px;
}

.nav-link.active {
  font-weight: bold;
}

.btn {
  border-radius: 8px;
  padding: 0.6em 1.2em;
  font-size: 1em;
  font-weight: 500;
  cursor: pointer;
  border: none;
}
</style>
