const { createApp } = Vue;

createApp({
  data() {
    return {
      keyword: '', category: 'all', sortOrder: 'none', pageStatus: 'Sẵn sàng',
      categories: ['Điện tử', 'Văn phòng phẩm', 'Gia dụng'],
      products: [
        { id: 1, name: 'Tai nghe Bluetooth', price: 450000, category: 'Điện tử', stock: 12 },
        { id: 2, name: 'Bút bi xanh', price: 5000, category: 'Văn phòng phẩm', stock: 0 },
        { id: 3, name: 'Bình giữ nhiệt', price: 180000, category: 'Gia dụng', stock: 8 },
        { id: 4, name: 'Bàn phím cơ', price: 890000, category: 'Điện tử', stock: 4 },
        { id: 5, name: 'Vở kẻ ngang', price: 12000, category: 'Văn phòng phẩm', stock: 25 },
        { id: 6, name: 'Đèn bàn học', price: 320000, category: 'Gia dụng', stock: 0 }
      ], newProduct: { name: '', price: null, category: '', stock: null }
    };
  },
  computed: {
    filteredProducts() {
      const term = this.keyword.trim().toLowerCase();
      let result = this.products.filter(p => (!term || term.length < 2 || p.name.toLowerCase().includes(term)) && (this.category === 'all' || p.category === this.category));
      if (this.sortOrder !== 'none') result = [...result].sort((a, b) => this.sortOrder === 'asc' ? a.price - b.price : b.price - a.price);
      return result;
    },
    inventoryValue() { return this.filteredProducts.reduce((sum, p) => sum + p.price * p.stock, 0); }
  },
  watch: { keyword(value) { if (value.length === 1) this.pageStatus = 'Nhập thêm từ khóa'; else this.pageStatus = 'Sẵn sàng'; } },
  mounted() { this.pageStatus = 'Sẵn sàng'; },
  methods: {
    formatMoney(value) { return new Intl.NumberFormat('vi-VN').format(value) + ' đ'; },
    addProduct() {
      if (!this.newProduct.name || !(this.newProduct.price > 0) || !Number.isInteger(this.newProduct.stock) || this.newProduct.stock < 0 || !this.newProduct.category) return alert('Vui lòng nhập tên, giá > 0, danh mục và tồn kho là số nguyên không âm.');
      this.products.push({ ...this.newProduct, id: Math.max(...this.products.map(p => p.id), 0) + 1 });
      this.newProduct = { name: '', price: null, category: '', stock: null };
    },
    removeProduct(id) { if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) this.products = this.products.filter(p => p.id !== id); }
  }
}).mount('#app');
