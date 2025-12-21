
  <footer>
    <p>&copy; 2025 Cognitive Robotics Lab </br>
    University of Arkansas </br>
    Fayetteville, AR 72701  </br>
    Written by <a href="/member.php?id=tuandang">Tuan Dang</a>, opened at <a href="https://github.com/cogniboticslab">Github</a>
  </p>
  </footer>

  <script>
     function toggleMenu() {
      document.getElementById('menu').classList.toggle('active');
    }

    // Active link highlight
    const links = document.querySelectorAll('nav a');
    links.forEach(link => {
      link.addEventListener('click', function () {
        links.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
      });
    });
  
    window.addEventListener('DOMContentLoaded', () => {
      const links = document.querySelectorAll('nav a');
      const currentUrl = window.location.href;
      const parts = currentUrl.split("/");
      // console.log(currentUrl);  // e.g., https://example.com/page.html
      // console.log(parts);
      var i = 0;
      links.forEach(link => {
        // Remove previous active classes
        link.classList.remove('active');
        if (i == 0 && parts[3] == ''){
          link.classList.add('active');
        }
        else if (i == 1 && parts[3] == 'team'){
          link.classList.add('active');
        }
        else if (i == 2 && parts[3] == 'publications'){
          link.classList.add('active');
        }
        else if (i == 3 && parts[3] == 'joinus'){
          link.classList.add('active');
        }
        else if (i == 4 && parts[3] == 'contact'){
          link.classList.add('active');
        }
        i++;
      });
    });
  </script>
