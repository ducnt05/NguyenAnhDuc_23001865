const { createApp } = Vue;

const TheSanPham = {
  props: {
    name: { type: String, required: true }, price: { type: Number, required: true },
    image: { type: String, default: 'https://placehold.co/600x400/dbeafe/1e3a8a?text=Product' },
    description: { type: String, default: 'Sản phẩm chất lượng, phù hợp cho nhu cầu hằng ngày.' },
    stock: { type: Number, default: 0 }
  },
  data() { return { showDescription: false }; },
  template: `<article class="product-card"><img :src="image" :alt="name"><div class="content"><h2>{{ name }}</h2><p class="price">{{ money(price) }}</p><p :class="['stock', stock > 0 ? 'available' : 'sold-out']">{{ stock > 0 ? 'Còn hàng' : 'Hết hàng' }} · {{ stock }} sản phẩm</p><p v-if="showDescription" class="description">{{ description }}</p><button class="toggle" @click="showDescription = !showDescription">{{ showDescription ? 'Ẩn mô tả' : 'Xem mô tả' }}</button><button class="buy" :disabled="stock === 0">Mua</button></div></article>`,
  methods: { money(value) { return new Intl.NumberFormat('vi-VN').format(value) + ' đ'; } }
};

createApp({
  components: { TheSanPham },
  data() { return { products: [
    { id: 1, name: 'Tai nghe Bluetooth', price: 450000, image: 'https://placehold.co/600x400/bae6fd/0c4a6e?text=Tai+nghe', description: 'Âm thanh rõ, pin dùng lâu.', stock: 12 },
    { id: 2, name: 'Bình giữ nhiệt', price: 180000, image: 'https://placehold.co/600x400/fde68a/713f12?text=Binh+giu+nhiet', description: 'Giữ nóng và lạnh tiện lợi.', stock: 8 },
    { id: 3, name: 'Bàn phím cơ', price: 890000, image: 'https://placehold.co/600x400/c7d2fe/312e81?text=Ban+phim', description: 'Gõ êm, độ bền cao.', stock: 4 },
    { id: 4, name: 'Đèn bàn học', price: 320000, image: 'https://placehold.co/600x400/fbcfe8/831843?text=Den+ban', description: 'Ánh sáng dịu, bảo vệ mắt.', stock: 0 }
  ] }; }
}).mount('#app');
