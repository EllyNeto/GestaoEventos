/**
 * GestãoEventos - Liquid & Interactive UI Effects
 */
document.addEventListener('DOMContentLoaded', () => {
  // 1. Mouse Follow Liquid Blob effect
  const liquidBg = document.getElementById('liquid-bg-container');
  if (liquidBg) {
    const mouseBlob = document.createElement('div');
    mouseBlob.className = 'liquid-blob mouse-follower-blob';
    mouseBlob.style.cssText = `
      width: 450px;
      height: 450px;
      background: radial-gradient(circle, rgba(6, 182, 212, 0.35) 0%, rgba(124, 58, 237, 0) 70%);
      position: absolute;
      top: 0;
      left: 0;
      pointer-events: none;
      transform: translate(-50%, -50%);
      transition: transform 0.25s cubic-bezier(0.1, 1, 0.1, 1);
      z-index: -1;
    `;
    liquidBg.appendChild(mouseBlob);

    let mouseX = window.innerWidth / 2;
    let mouseY = window.innerHeight / 2;

    window.addEventListener('mousemove', (e) => {
      mouseX = e.clientX;
      mouseY = e.clientY;
      mouseBlob.style.left = `${mouseX}px`;
      mouseBlob.style.top = `${mouseY + window.scrollY}px`;
    });
  }

  // 2. Liquid Button Ripple Effect
  const buttons = document.querySelectorAll('.btn, .liquid-btn, .nav-link');
  buttons.forEach(button => {
    button.addEventListener('click', function (e) {
      // Don't execute ripple for forms submitting via default click if prevented
      const circle = document.createElement('span');
      circle.classList.add('ripple');
      
      const rect = this.getBoundingClientRect();
      const diameter = Math.max(rect.width, rect.height);
      const radius = diameter / 2;

      circle.style.width = circle.style.height = `${diameter}px`;
      circle.style.left = `${e.clientX - rect.left - radius}px`;
      circle.style.top = `${e.clientY - rect.top - radius}px`;

      const existingRipple = this.querySelector('.ripple');
      if (existingRipple) {
        existingRipple.remove();
      }

      this.appendChild(circle);
    });
  });

  // 3. Auto dismiss alert msg after 5 seconds if present
  const alertMsg = document.querySelector('.msg');
  if (alertMsg) {
    setTimeout(() => {
      alertMsg.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      alertMsg.style.opacity = '0';
      alertMsg.style.transform = 'translateY(-10px)';
      setTimeout(() => alertMsg.remove(), 600);
    }, 5000);
  }
});
