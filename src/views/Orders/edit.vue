<template>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Order</h1>
        <form @submit.prevent="updateOrder">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input 
                    type="text" 
                    id="nama" 
                    class="form-control" 
                    v-model="form.nama" 
                    placeholder="Nama" 
                    required
                />
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input 
                    type="text" 
                    id="alamat" 
                    class="form-control" 
                    v-model="form.alamat" 
                    placeholder="Alamat" 
                    required
                />
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input 
                    type="text" 
                    id="kode_pos" 
                    class="form-control" 
                    v-model="form.kode_pos" 
                    placeholder="Kode Pos" 
                    required
                />
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input 
                    type="text" 
                    id="no_telepon" 
                    class="form-control" 
                    v-model="form.no_telepon" 
                    placeholder="No Telepon" 
                    required
                />
            </div>
            <div class="mb-3">
                <label for="nama_project" class="form-label">Nama Project</label>
                <input 
                    type="text" 
                    id="nama_project" 
                    class="form-control" 
                    v-model="form.nama_project" 
                    placeholder="Nama Project" 
                    required
                />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            form: {
                id: null,
                nama: "",
                alamat: "",
                kode_pos: "",
                no_telepon: "",
                nama_project: "",
            },
        };
    },
    async mounted() {
        const id = this.$route.params.id; // Ambil ID dari route
        try {
            const response = await axios.get(`http://127.0.0.1:8000/api/orders/${id}`);
            this.form = response.data.data; // Isi form dengan data dari server
        } catch (error) {
            console.error("Error fetching order:", error);
        }
    },
    methods: {
        async updateOrder() {
            try {
                await axios.put(`http://127.0.0.1:8000/api/orders/${this.form.id}`, this.form);
                alert("Order berhasil diupdate!");
                this.$router.push("/orders"); // Redirect ke halaman index
            } catch (error) {
                console.error("Error updating order:", error);
            }
        },
    },
};
</script>
