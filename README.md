# Cognibotics Lab's website

- Demo here: [https://www.cogniboticslab.org](https://www.cogniboticslab.org/)

![](./images/site.jpg)

- Migrate from
    - Ruby version: 3.4.7
    - Version: Jekyll 4.4.1

- To **PHP** (version 8.1, tested Namecheap server)

## Development

Clone from our github
``` shell
git clone https://github.com/cogniboticslab/lab_website.git
```

## Design
- Please make changes as your own design at **includes/default.html**
- Specific page located at **_inlcude/*.html** and **markdown files**: *.markdown

## Database (static YAML): 
- folder **members**: this folder contains individual information (for page member.php)
- **config.yml**: general website information
- **news.yml**: News
- **publications.yml**: Publications
- **team.yml**: All lab members


## Deployment
- Copy this repos to server/host support PHP (tested version 8.1) without SQL.
- Tested on Namecheap: [https://www.cogniboticslab.org](https://www.cogniboticslab.org/)