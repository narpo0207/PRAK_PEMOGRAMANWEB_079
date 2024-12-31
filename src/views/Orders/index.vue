<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const orders = ref([]); // Menyimpan daftar orders
const loading = ref(true); // Status loading
const error = ref(null); // Menyimpan pesan error
const deleting = ref(false); // Status untuk delete action

const getOrders = async () => {
  try {
    // Mengambil data dari API
    const response = await axios.get('http://127.0.0.1:8000/api/orders');
    console.log('Response data:', response.data); // Debugging untuk memastikan struktur respons
    orders.value = response.data.data.data || []; // Menyimpan data orders sesuai struktur
  } catch (err) {
    error.value = 'Gagal memuat data order. Silakan coba lagi.'; // Pesan error yang ditampilkan
    console.error('Error fetching orders:', err); // Debugging error
  } finally {
    loading.value = false; // Menyembunyikan loading setelah request selesai
  }
};

const deleteOrder = async (id) => {
  if (!confirm('Apakah Anda yakin ingin menghapus order ini?')) return;

  deleting.value = true;
  try {
    // Memanggil API DELETE
    await axios.delete(`http://127.0.0.1:8000/api/orders/${id}`);
    // Filter order yang dihapus dari daftar
    orders.value = orders.value.filter(order => order.id !== id);
    alert('Order berhasil dihapus.');
  } catch (err) {
    alert('Gagal menghapus order. Silakan coba lagi.');
    console.error('Error deleting order:', err); // Debugging error
  } finally {
    deleting.value = false;
  }
};

// Memanggil fungsi getOrders saat komponen dimuat
onMounted(getOrders);
</script>

<template>
  <div class="container mt-5">
    <h2 class="mb-4">Daftar Order Kami</h2>
    <router-link to="/orders/create" class="btn btn-success mb-3">Tambah Order</router-link>

    <!-- Pesan Loading -->
    <div v-if="loading" class="text-center">
      <p>Memuat data order...</p>
    </div>

    <!-- Pesan Error -->
    <div v-else-if="error" class="alert alert-danger text-center">
      {{ error }}
    </div>

    <!-- Menampilkan daftar orders -->
    <div v-else>
      <!-- Jika ada orders -->
      <div class="row" v-if="orders.length > 0">
        <div class="col-sm-6 col-md-4 col-lg-3" v-for="order in orders" :key="order.id">
          <div class="card mb-4">
            <img 
              v-if="order.image" 
              :src="`/storage/${order.image}`" 
              class="card-img-top" 
              :alt="'Image of ' + order.nama_project"
            >
            <div class="card-body">
              <h5 class="card-title">{{ order.nama_project }}</h5>
              <p class="card-text">{{ order.alamat }}</p>
              <router-link 
                :to="'/orders/' + order.id + '/edit'" 
                class="btn btn-warning btn-sm me-2"
              >
                Edit
              </router-link>
              <button 
                class="btn btn-danger btn-sm"
                @click="deleteOrder(order.id)"
                :disabled="deleting"
              >
                Hapus
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Jika tidak ada orders -->
      <div v-else class="text-center">
        <p>Belum ada order tersedia.</p>
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Gaya untuk gambar dalam card */
.card-img-top {
  height: 200px;
  object-fit: cover;
}

/* Gaya untuk card */
.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 1.25rem;
}

.card-title {
  font-size: 1.25rem;
  font-weight: bold;
}

.card-text {
  font-size: 1rem;
  color: #555;
}

/* Margin untuk tombol */
.btn {
  margin-top: 1rem;
}

/* Margin untuk row */
.row {
  margin-top: 20px;
}
</style>
