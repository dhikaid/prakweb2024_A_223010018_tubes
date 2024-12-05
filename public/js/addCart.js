document.addEventListener("alpine:init", () => {
    Alpine.data("useForm", () => ({
        tickets: [], // Inisialisasi tiket sebagai array kosong
        minTickets: 1, // Batas minimal tiket
        maxTickets: 10, // Batas maksimal tiket
        errorMessage: "", // Menyimpan pesan kesalahan

        // Fungsi untuk mengambil data input
        data() {
            const inputs = Array.from(this.$el.querySelectorAll("input"));
            const data = inputs.reduce(
                (object, key) => ({ ...object, [key.name]: key.value }),
                {}
            );
            return data;
        },

        // Fungsi untuk menambahkan tiket atau menambah qty jika tiket sudah ada
        async post(uuid) {
            const qty = parseInt(this.data().qty, 10);

            // Validasi jumlah tiket yang dibeli
            if (qty < this.minTickets) {
                this.errorMessage = `Minimal beli ${this.minTickets} tiket per kategori`;
                return; // Jangan lanjutkan jika qty kurang dari batas minimal
            }
            if (qty > this.maxTickets) {
                this.errorMessage = `Maksimal beli ${this.maxTickets} tiket per kategori`;
                return; // Jangan lanjutkan jika qty lebih dari batas maksimal
            }

            this.errorMessage = ""; // Reset pesan kesalahan jika validasi lolos

            await fetch(`/service/api/ticket/${uuid}`, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            }).then(async (result) => {
                const data = await result.json();
                const ticketData = {
                    tickets: data.ticket_uuid,
                    name: data.jenis_ticket,
                    qty: qty,
                    price: data.ticket_price,
                };

                // Cek apakah tiket dengan nama yang sama sudah ada
                const existingTicket = this.tickets.find(
                    (ticket) => ticket.name === ticketData.name
                );

                if (existingTicket) {
                    // Jika tiket sudah ada, tambah qty-nya
                    const newQty = existingTicket.qty + ticketData.qty;
                    // Pastikan qty tidak melebihi batas maksimal
                    if (newQty > this.maxTickets) {
                        this.errorMessage = `Maksimal beli ${this.maxTickets} tiket per kategori`;
                        return; // Jangan lanjutkan jika qty lebih dari batas maksimal
                    }
                    existingTicket.qty = newQty;
                } else {
                    // Jika tiket belum ada, tambahkan tiket baru
                    this.tickets.push(ticketData);
                }
                console.log(this.tickets);
            });
        },

        // Fungsi untuk menghitung total harga dari tiket yang ada
        getTotal() {
            return this.tickets.reduce((total, ticket) => {
                return total + ticket.qty * ticket.price; // Total harga = qty * price
            }, 0);
        },
    }));
});
