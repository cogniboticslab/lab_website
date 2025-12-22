## **Cognibotics Lab's website**

- Demo here: [https://www.cogniboticslab.org](https://www.cogniboticslab.org/)

![](./images/site.jpg)

- Migrate from
    - Ruby version: 3.4.7
    - Version: Jekyll 4.4.1

- To **PHP** (version 8.1, tested Namecheap hosting)
    - Prevent **recompiling** $\rightarrow$ **copying** new files to host everytime we add new data
    - Focus on adding/modifying data (folder **data**) without touching and copying from static output html to hosting.

### **Development**

Clone from our github
``` shell
git clone https://github.com/cogniboticslab/lab_website.git
```

### **Design**
- Please make changes as your own design in **includes**
- Specific page located at **inlcudes/*.php**

### **Database (static YAML):**
- **config.yml**: general website information
- **news.yml**: News
- **projects.yml**: Projects
- **publications.yml**: Publications
- **team.yml**: All lab members
- **members**: this folder contains individual information (for page member.php)


### **Host the website**
- Copy this repos to server/host supporting **PHP** (tested version 8.1) without SQL.
- Test on Namecheap: [https://www.cogniboticslab.org](https://www.cogniboticslab.org/)