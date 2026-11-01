<!doctype html>
<html lang="vi">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bài 1 - Thẻ thông tin sinh viên</title>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <style>
    *{box-sizing:border-box}body{margin:0;background:#f1f5f9;font-family:Arial,sans-serif;color:#172033}.page{max-width:850px;margin:40px auto;padding:0 16px}.card{background:#fff;border-radius:16px;padding:28px;box-shadow:0 8px 25px #0f172a18}.student{display:flex;gap:26px;align-items:center}.avatar{width:170px;height:170px;border-radius:18px;border:5px solid #dbeafe}.grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}.item{padding:13px;background:#f8fafc;border-radius:10px}.label{display:block;color:#64748b;font-size:13px;margin-bottom:5px}.result{padding:5px 10px;border-radius:20px;font-weight:bold}.excellent{color:#166534;background:#dcfce7}.good{color:#1d4ed8;background:#dbeafe}.average{color:#92400e;background:#fef3c7}.fail{color:#b91c1c;background:#fee2e2}button{border:0;border-radius:8px;padding:10px 15px;background:#2563eb;color:white;font-weight:bold;cursor:pointer}.intro{margin-top:18px;padding:14px;background:#eff6ff;border-left:4px solid #2563eb}@media(max-width:650px){.student{display:block}.avatar{width:130px;height:130px;margin-bottom:18px}.grid{grid-template-columns:1fr}}
  </style>
</head>
<body><main class="page" id="app">
  <section class="card">
    <h1>Thẻ thông tin sinh viên</h1>
    <div class="student">
      <img class="avatar" v-bind:src="student.avatar" v-bind:alt="'Ảnh đại diện của '+student.name">
      <div><h2>{{ student.name }}</h2><div class="grid">
        <div class="item"><span class="label">Mã sinh viên</span>{{ student.id }}</div>
        <div class="item"><span class="label">Lớp</span><span v-text="student.className"></span></div>
        <div class="item"><span class="label">Điểm trung bình</span>{{ student.gpa.toFixed(1) }}</div>
        <div class="item"><span class="label">Xếp loại</span><span class="result" :class="classification.className">{{ classification.label }}</span></div>
        <div class="item"><span class="label">Trạng thái</span><span v-if="student.isStudying">Đang học</span><span v-else>Đã nghỉ</span></div>
      </div></div>
    </div>
    <br><button @click="showIntro=!showIntro">{{showIntro?'Ẩn':'Hiện'}} phần giới thiệu</button>
    <p class="intro" v-show="showIntro">Xin chào! Mình là {{student.name}}, sinh viên lớp {{student.className}}.</p>
  </section>
</main><script>
const {createApp}=Vue;createApp({data(){return{student:{id:'SV001',name:'Nguyễn Minh Anh',className:'CNTT-K47',gpa:8.2,isStudying:true,avatar:'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="320" height="320"%3E%3Crect width="320" height="320" rx="30" fill="%23bfdbfe"/%3E%3Ccircle cx="160" cy="120" r="60" fill="%231e3a8a"/%3E%3Cpath d="M55 300c12-75 52-108 105-108s93 33 105 108" fill="%232563eb"/%3E%3C/svg%3E'},showIntro:false}},computed:{classification(){let s=this.student.gpa;if(s>=8)return{label:'Giỏi',className:'excellent'};if(s>=6.5)return{label:'Khá',className:'good'};if(s>=5)return{label:'Trung bình',className:'average'};return{label:'Chưa đạt',className:'fail'}}}}).mount('#app');
</script></body></html>
