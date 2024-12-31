<template>
    <div class="container mt-5">
      <h2 class="mb-4">Buat Order Baru</h2>
      <form @submit.prevent="createOrder" class="form-group">
        <div class="mb-3" v-for="(label, field) in fields" :key="field">
          <label :for="field" class="form-label">{{ label }}</label>
          <input
            type="text"
            v-model="form[field]"
            :id="field"
            class="form-control"
            :placeholder="label"
            required
          />
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <div v-if="error" class="alert alert-danger mt-3">{{ error }}</div>
        <div v-if="success" class="alert alert-success mt-3">{{ success }}</div>
      </form>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        form: {
          nama: "",
          alamat: "",
          kode_pos: "",
          no_telepon: "",
          nama_project: "",
        },
        fields: {
          nama: "Nama",
          alamat: "Alamat",
          kode_pos: "Kode Pos",
          no_telepon: "No Telepon",
          nama_project: "Nama Project",
        },
        error: null,
        success: null,
      };
    },
    methods: {
      async createOrder() {
        this.error = null;
        this.success = null;
  
        try {
          const response = await axios.post(
            "http://127.0.0.1:8000/api/orders",
            this.form
          );
  
          // Tampilkan pesan sukses
          this.success = response.data.message;
          this.form = {
            nama: "",
            alamat: "",
            kode_pos: "",
            no_telepon: "",
            nama_project: "",
          };
  
          // Redirect jika diperlukan
          setTimeout(() => this.$router.push("/orders"), 2000);
        } catch (error) {
          // Tampilkan pesan error dari backend
          this.error =
            error.response?.data?.message || "Gagal membuat order. Silakan coba lagi.";
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 600px;
    margin: 0 auto;
  }
  </style>
  