// File input and output are in VIETNAMESE, edit at will
// Enjoy!

<style>
#district, #shipping-note {
    display: none;
}
</style>

<div class="widget-container">
    <select name="city" id="city">
    	<option value="-">- Chọn Tỉnh/Thành Phố -</option>
    </select>
    <select name="district" id="district">
    	<option value="-">- Chọn Quận/Huyện -</option>
    </select>
</div>

<table>
    <tr>
        <td>Phí ship</td>
        <td>Thời gian*</td>
    </tr>
    <tr>
        <td id="shipping-fee"></td>
        <td id="shipping-time"></td>
    </tr>
    <tr>
        <td  id="shipping-note" colspan="2"></td>
    </tr>
</table>

<script>
var tinhthanh = ["Hồ Chí Minh","Hà Nội","An Giang","Bắc Giang","Bắc Kạn","Bạc Liêu","Bắc Ninh","Bà Rịa - Vũng Tàu","Bến Tre","Bình Định",
                "Bình Dương","Bình Phước","Bình Thuận","Cà Mau","Cần Thơ","Cao Bằng","Đắk Lắk","Đắk Nông","Đà Nẵng","Điện Biên","Đồng Nai",
                "Đồng Tháp","Gia Lai","Hà Giang","Hải Dương","Hải Phòng","Hà Nam","Hà Tĩnh","Hậu Giang","Hòa Bình","Hưng Yên","Khánh Hòa",
                "Kiên Giang","Kon Tum","Lai Châu","Lâm Đồng","Lạng Sơn","Lào Cai","Long An","Nam Định","Nghệ An","Ninh Bình","Ninh Thuận",
                "Phú Thọ","Phú Yên","Quảng Bình","Quảng Nam","Quảng Ngãi","Quảng Ninh","Quảng Trị","Sóc Trăng","Sơn La","Tây Ninh","Thái Bình",
                "Thái Nguyên","Thanh Hóa","Thừa Thiên Huế","Tiền Giang","Trà Vinh","Tuyên Quang","Vĩnh Long","Vĩnh Phúc","Yên Bái"];

var quanhuyen = ["Quận 1","Quận 3","Quận 4","Quận 5","Quận 6","Quận 7","Quận 8","Quận 10","Quận 11","Quận 12","Thành phố Thủ Đức",
                "Quận Bình Tân","Quận Bình Thạnh","Quận Gò Vấp","Quận Phú Nhuận","Quận Tân Bình","Quận Tân Phú","Huyện Bình Chánh",
                "Huyện Cần Giờ","Huyện Củ Chi","Huyện Hóc Môn","Huyện Nhà Bè"];

// Add array to city dropdown
var select_tinhthanh = document.getElementById("city");

for(var i = 0; i < tinhthanh.length; i++) {
    let opt = tinhthanh[i];
    let el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select_tinhthanh.appendChild(el);
};

// Add array to district dropdown
var select_quanhuyen = document.getElementById("district");

for(var i = 0; i < quanhuyen.length; i++) {
    let opt = quanhuyen[i];
    let el = document.createElement("option");
    el.textContent = opt;
    el.value = opt;
    select_quanhuyen.appendChild(el);
};

// Display district dropdown when HCM city is selected & note for shipping options
var note = document.getElementById("shipping-note");

select_tinhthanh.onchange = function() {
    select_quanhuyen.style.display = (this.value == "Hồ Chí Minh") ? "block":"none";
    note.style.display = (tinhthanh.includes(this.value) && this.value !== "Hồ Chí Minh") ? "table-cell":"none";
};

select_quanhuyen.onchange = function() {
    note.style.display = (this.value == "Quận 8" || this.value == "Thành phố Thủ Đức") ? "table-cell":"none";
};

// Price and time output when city and district selected
select_tinhthanh.addEventListener('change', function() {
    var chosen_tinhthanh = this.value; // Get the currently selected city
    
    if (chosen_tinhthanh == "Hồ Chí Minh") {
        document.getElementById("shipping-fee").innerHTML = "..."; // Clear the output if no district is selected
        document.getElementById("shipping-time").innerHTML = "...";
        document.getElementById("shipping-note").innerHTML = "...";
        
        select_quanhuyen.addEventListener('change', function() {
            var chosen_quanhuyen = this.value; // Get the currently selected district
            
            if (chosen_quanhuyen == "Quận 1" || chosen_quanhuyen == "Quận 10" || chosen_quanhuyen == "Quận Phú Nhuận") {
                document.getElementById("shipping-fee").innerHTML = "Giao 4h: 25,000đ<br>Siêu tốc: 30,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 4 tiếng<br>Trong 1 tiếng";
            } else if (chosen_quanhuyen == "Quận 3") {
                document.getElementById("shipping-fee").innerHTML = "Siêu tốc: 20,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 1 tiếng";
            } else if (chosen_quanhuyen == "Quận 4" || chosen_quanhuyen == "Quận 5") {
                document.getElementById("shipping-fee").innerHTML = "Giao 4h: 25,000đ<br>Siêu tốc: 40,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 4 tiếng<br>Trong 1 tiếng";
            } else if (chosen_quanhuyen == "Quận 6" || chosen_quanhuyen == "Quận 7") {
                document.getElementById("shipping-fee").innerHTML = "Giao 6h: 22,000đ<br>Giao 4h: 35,000đ<br>Siêu tốc: 70,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 6 tiếng<br>Trong 4 tiếng<br>Trong 1 tiếng";
            } else if (chosen_quanhuyen == "Quận 8") {
                document.getElementById("shipping-fee").innerHTML = "<u>Nhóm 1:</u><br>Giao 6h: 22,000đ<br>Giao 4h: 35,000đ<br>Siêu tốc: 60,000đ<br><u>Nhóm 2:</u><br>Giao 6h: 22,000đ<br>Giao 4h: 40,000đ";
                document.getElementById("shipping-time").innerHTML = "<br>Trong 6 tiếng<br>Trong 4 tiếng<br>Trong 1 tiếng<br><br>Trong 6 tiếng<br>Trong 4 tiếng";
                document.getElementById("shipping-note").innerHTML = "<u>Nhóm 1:</u> Phường 1, 2, 3, 4, 5, 6, 8, 9, 10, 11, 12, 13, 14.<br><u>Nhóm 2:</u> Phường 7, 15, 16.";
            } else if (chosen_quanhuyen == "Quận 11" || chosen_quanhuyen == "Quận Tân Bình" || chosen_quanhuyen == "Quận Tân Phú" || chosen_quanhuyen == "Quận Bình Thạnh") {
                document.getElementById("shipping-fee").innerHTML = "Giao 4h: 25,000đ<br>Siêu tốc: 50,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 4 tiếng<br>Trong 1 tiếng";
            } else if (chosen_quanhuyen == "Quận 12" || chosen_quanhuyen == "Quận Bình Tân") {
                document.getElementById("shipping-fee").innerHTML = "Giao 6h: 22,000đ<br>Giao 4h: 40,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 6 tiếng<br>Trong 4 tiếng";
            } else if (chosen_quanhuyen == "Quận Gò Vấp") {
                document.getElementById("shipping-fee").innerHTML = "Giao 6h: 22,000đ<br>Giao 4h: 35,000đ<br>Siêu tốc: 60,000đ";
                document.getElementById("shipping-time").innerHTML = "Trong 6 tiếng<br>Trong 4 tiếng<br>Trong 1 tiếng";
            } else if (chosen_quanhuyen == "Thành phố Thủ Đức") {
                document.getElementById("shipping-fee").innerHTML = "<u>Nhóm 1:</u><br>Giao 6h: 22,000đ<br>Giao 4h: 40,000đ<br><u>Nhóm 2:</u><br>Giao 6h: 22,000đ";
                document.getElementById("shipping-time").innerHTML = "<br>Trong 6 tiếng<br>Trong 4 tiếng<br><br>Trong 6 tiếng";
                document.getElementById("shipping-note").innerHTML = "<u>Nhóm 1 (phường):</u> An Khánh, An Lợi Đông, An Phú, Bình Chiểu, Bình Thọ, Bình Trưng Đông, Bình Trương Tây, Cát Lái, Hiệp Bình Chánh, Hiệp Bình Phước, Hiệp Phú, Linh Chiểu, Linh Đông, Linh Tây, Linh Trung, Linh Xuân, Phú Hữu, Phước Bình, Phước Long A, Phước Long B, Tam Bình, Tam Phú, Tăng Nhơn Phú A, Tăng Nhơn Phú B, Thạnh Mỹ Lợi, Thảo Điền, Thủ Thiêm, Trường Thọ.<br><u>Nhóm 2 (phường):</u> Long Bình, Long Phước, Long Thạnh Mỹ, Long Trường, Tân Phú, Trường Thạnh.";
            } else if (chosen_quanhuyen == "-") {
                document.getElementById("shipping-fee").innerHTML = "..."; // Clear the output if no city is selected
                document.getElementById("shipping-time").innerHTML = "...";
                document.getElementById("shipping-note").innerHTML = "...";
            } else {
                document.getElementById("shipping-fee").innerHTML = "Giao 6h: 30,000đ"; // For other districts
                document.getElementById("shipping-time").innerHTML = "Trong 6 tiếng";
            };
        });
    } else if (chosen_tinhthanh == "An Giang" || chosen_tinhthanh == "Bạc Liêu" || chosen_tinhthanh == "Bà Rịa - Vũng Tàu" || chosen_tinhthanh == "Bến Tre" ||
               chosen_tinhthanh == "Bình Dương" || chosen_tinhthanh == "Bình Phước" || chosen_tinhthanh == "Cà Mau" || chosen_tinhthanh == "Cần Thơ" ||
               chosen_tinhthanh == "Đồng Nai" || chosen_tinhthanh == "Đồng Tháp" || chosen_tinhthanh == "Hậu Giang" || chosen_tinhthanh == "Kiên Giang" ||
               chosen_tinhthanh == "Long An" || chosen_tinhthanh == "Sóc Trăng" || chosen_tinhthanh == "Tây Ninh" || chosen_tinhthanh == "Tiền Giang" ||
               chosen_tinhthanh == "Trà Vinh" || chosen_tinhthanh == "Vĩnh Long") {
        document.getElementById("shipping-fee").innerHTML = "Tiêu chuẩn: 35,000đ";
        document.getElementById("shipping-time").innerHTML = "Trong 24 tiếng";
        document.getElementById("shipping-note").innerHTML = "Giá trên áp dụng cho đơn hàng cân nặng dưới 500g (hộp 6 bánh). Với cân nặng 1 bánh ~60g, giá vận chuyển sẽ +5,000đ cho tổng 500g tiếp theo.<br>Bạn sẽ thấy tổng tiền vận chuyển tính tự động ở trang thanh toán nhé!";
    } else if (chosen_tinhthanh == "-") {
        document.getElementById("shipping-fee").innerHTML = "..."; // Clear the output if no city is selected
        document.getElementById("shipping-time").innerHTML = "...";
        document.getElementById("shipping-note").innerHTML = "...";
    } else {
        document.getElementById("shipping-fee").innerHTML = "Tiêu chuẩn: 40,000đ<br>Nhanh chóng: 55,000đ";
        document.getElementById("shipping-time").innerHTML = "Từ 3-5 ngày<br>Trong 48 tiếng";
        document.getElementById("shipping-note").innerHTML = "Giá trên áp dụng cho đơn hàng cân nặng dưới 500g (hộp 6 bánh). Với cân nặng 1 bánh ~60g, giá vận chuyển sẽ +5,000đ cho tổng 500g tiếp theo.<br>Bạn sẽ thấy tổng tiền vận chuyển tính tự động ở trang thanh toán nhé!";
    }
});
</script>
