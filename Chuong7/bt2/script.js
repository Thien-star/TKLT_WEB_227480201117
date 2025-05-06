// Chọn tất cả các nút .toggle trong accordion
document.querySelectorAll('.accordion button.toggle').forEach(btn => {
    btn.addEventListener('click', function(e) {
      e.stopPropagation();
  
      const li = this.parentElement;          // <li> cha chứa nút
      const subUl = li.querySelector(':scope > ul');
      if (!subUl) return;                     // không có cấp con thì bỏ qua
  
      // (Tùy chọn) Đóng tất cả các li anh em,
      // để chỉ mở được 1 mục cùng cấp mỗi lúc.
      const sibs = li.parentElement.children;
      for (let sib of sibs) {
        if (sib !== li) {
          sib.classList.remove('open');
          const sibBtn = sib.querySelector(':scope > button.toggle');
          if (sibBtn) sibBtn.classList.remove('open');
        }
      }
  
      // Toggle chính nó
      const isOpen = li.classList.toggle('open');
      this.classList.toggle('open', isOpen);
    });
  });
  