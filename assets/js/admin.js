const ctx = document.getElementById("myChart");

new Chart(ctx, {
  type: "bar",
  data: {
    labels: ["Sản phẩm", "Khách hàng", "Đơn hàng", "Bình luận"],
    datasets: [
      {
        label: "Thống kê chung cửa hàng",
        data: [12, 19, 3, 5],
        borderWidth: 1,
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(75, 192, 192)",
          "rgb(255, 205, 86)",
          "rgb(201, 203, 207)",
        ],
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});

const ctx2 = document.getElementById("myChart2");

new Chart(ctx2, {
  type: "line",
  data: {
    labels: ["Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8"],
    datasets: [
      {
        label: "Doanh số cửa hàng 5 tháng gần nhất",
        data: [12, 19, 20, 14, 10],
        borderWidth: 2,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
        backgroundColor: [
          "rgb(255, 99, 132)",
          "rgb(75, 192, 192)",
          "rgb(255, 205, 86)",
          "rgb(201, 203, 207)",
        ],
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
