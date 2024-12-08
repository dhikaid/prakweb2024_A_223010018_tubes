document.addEventListener("alpine:init", () => {
    Alpine.data("useForm", () => ({
        tickets: [], // Inisialisasi tiket sebagai array kosong
        minTickets: 1, // Batas minimal tiket
        maxTickets: 10, // Batas maksimal tiket
        errorMessage: "", // Menyimpan pesan kesalahan

        // Fungsi untuk mengambil data input langsung dari form
        getFormData() {
            const inputs = Array.from(this.$el.querySelectorAll("input"));
            return inputs.reduce(
                (data, input) => ({ ...data, [input.name]: input.value }),
                {}
            );
        },

        // Fungsi untuk menambahkan tiket atau menambah qty jika tiket sudah ada
        async post(uuid) {
            const formData = this.getFormData();
            const qty = parseInt(formData.qty, 10);

            // Validasi jumlah tiket yang dibeli
            if (qty < this.minTickets) {
                this.errorMessage = `Minimal beli ${this.minTickets} tiket per kategori`;
                return;
            }
            if (qty > this.maxTickets) {
                this.errorMessage = `Maksimal beli ${this.maxTickets} tiket per kategori`;
                return;
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
                    tickets: data.uuid,
                    name: data.ticket,
                    qty: qty,
                    price: data.price,
                };

                // Cek apakah tiket dengan nama yang sama sudah ada
                const existingTicket = this.tickets.find(
                    (ticket) => ticket.name === ticketData.name
                );

                if (existingTicket) {
                    // Jika tiket sudah ada, tambah qty-nya
                    const newQty = existingTicket.qty + ticketData.qty;
                    if (newQty > this.maxTickets) {
                        this.errorMessage = `Maksimal beli ${this.maxTickets} tiket per kategori`;
                        return;
                    }
                    existingTicket.qty = newQty;
                } else {
                    // Jika tiket belum ada, tambahkan tiket baru
                    this.tickets.push(ticketData);
                }
                console.log(this.tickets);
            });
        },

        // Fungsi untuk mengurangi jumlah tiket
        decreaseTicket(name) {
            const ticket = this.tickets.find((t) => t.name === name);
            if (ticket) {
                ticket.qty -= 1;
                if (ticket.qty <= 0) {
                    this.tickets = this.tickets.filter((t) => t.name !== name);
                }
            }
        },

        increaseTicket(name) {
            const ticket = this.tickets.find((t) => t.name === name);
            if (ticket) {
                ticket.qty += 1;
                // block jika melebihi 10
                if (ticket.qty > this.maxTickets) {
                    ticket.qty = this.maxTickets;
                    this.errorMessage = `Maksimal beli ${this.maxTickets} tiket per kategori`;
                }
            }
        },

        // Fungsi untuk menghapus tiket
        deleteTicket(name) {
            this.tickets = this.tickets.filter((t) => t.name !== name);
        },

        // Fungsi untuk menghitung total harga dari tiket yang ada
        getTotal() {
            return this.tickets.reduce((total, ticket) => {
                return total + ticket.qty * ticket.price;
            }, 0);
        },
    }));
});
