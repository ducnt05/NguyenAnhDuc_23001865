const { createApp } = Vue;

const DongGioHang = {
  props: { item: { type: Object, required: true } },
  template: `<article class="cart-item"><div><span class="name">{{ item.name }}</span><span class="muted">Đơn giá: {{ money(item.price) }}</span></div><div class="quantity"><button @click="change(item.quantity - 1)">−</button><input type="number" min="1" max="99" :value="item.quantity" @change="change(Number($event.target.value))"><button @click="change(item.quantity + 1)">+</button></div><span class="subtotal">{{ money(item.price * item.quantity) }}</span><button class="remove" @click="$emit('yeu-cau-xoa', item.id)">Xóa</button></article>`,
  methods: {
    money(value) { return new Intl.NumberFormat('vi-VN').format(value) + ' đ'; },
    change(quantity) { if (Number.isInteger(quantity) && quantity >= 1 && quantity <= 99) this.$emit('doi-so-luong', this.item.id, quantity); }
  }
};

createApp({
  components: { DongGioHang },
  data() { return { cart: [{ id: 1, name: 'Bút bi', price: 5000, quantity: 2 }, { id: 2, name: 'Vở', price: 12000, quantity: 3 }] }; },
  computed: { totalQuantity() { return this.cart.reduce((sum, item) => sum + item.quantity, 0); }, totalPrice() { return this.cart.reduce((sum, item) => sum + item.price * item.quantity, 0); } },
  methods: {
    money(value) { return new Intl.NumberFormat('vi-VN').format(value) + ' đ'; },
    changeQuantity(id, quantity) { const item = this.cart.find(product => product.id === id); if (item && Number.isInteger(quantity) && quantity >= 1 && quantity <= 99) item.quantity = quantity; },
    removeItem(id) { this.cart = this.cart.filter(item => item.id !== id); }
  }
}).mount('#app');
