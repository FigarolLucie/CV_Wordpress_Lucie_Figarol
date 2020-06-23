var app = {

  baseUrl: 'http://localhost/CV_Lucie_Figarol/',
  jsonUrl: '/wp-json/wp/v2/',

  init: async function () {
    console.log('init');

    app.loadProjects();
    await app.loadLevelsSkills();
    const skill = document.querySelectorAll('.skill__item');

    for (let i = 0; i < skill.length; i++) {
      skill[i].addEventListener('click', function () {
        app.loadProjectsFilter(skill[i]);
      });
    }

    document.getElementById('allProjects').addEventListener('click', function () {
      app.loadProjects();
    });

    
  },

  cleanProjectsList: function () {

    const containerSkill = document.querySelectorAll('.skill__project__container');

    for (let i = 0; i < containerSkill.length; i++) {
      //console.log(containerSkill[i]);
      containerSkill[i].remove();
    }
  },

  loadProjectsFilter: function (skill) {

    //nettoyage liste des projets
    app.cleanProjectsList();

    const idSkill = skill.dataset.id;

    axios.get(app.baseUrl + app.jsonUrl + 'projets?techno=' + idSkill)
      .then(function (response) {
        var project;

        for (index in response.data) {

          project = response.data[index];
          app.projectItem(project);

        }
      })

  },

  loadLevelsSkills: function () {

    return axios.get(app.baseUrl + app.jsonUrl + 'techno?per_page=100')
      .then(function (response) {
        var techno;

        for (index in response.data) {
          techno = response.data[index];
          app.levelItems(techno);
        }
      })
      .catch(function (error) {
        //app.displayError(error);
        console.log(error);
      });
  },

  levelItems: function (techno) {

    //Création de l'élément
    const p = document.createElement('p');
    p.classList.add('skill__item');
    p.innerText = techno.name;

    //Ciblage du parent 
    document.querySelector('#skills__container').append(p);

    //Ajout de l'ID sur chaque Skills pour cibler par la suite les projets avec le même skill
    p.dataset.id = techno.id;

    const description = techno.description;

    if (description === "occasionnelle") {
      p.style.backgroundColor = "#b2e0e0";
    }
    else if (description == "frequente") {
      p.style.backgroundColor = "#66c0c2";
    }
    else if (description == 'notions') {
      p.style.backgroundColor = "#CCD1D1";
    }
    else {
      p.style.backgroundColor = "#cc6699";
    }


  },

  loadProjects: function () {

    // Nettoyage des précédents projets
    const containerSkill = document.querySelectorAll('.skill__project__container');

    for (let i = 0; i < containerSkill.length; i++) {
      //console.log(containerSkill[i]);
      containerSkill[i].remove();
    }

    axios.get(app.baseUrl + app.jsonUrl + 'projets?filter[orderby]=date&order=asc')
      .then(function (response) {
        var project;

        for (index in response.data) {

          project = response.data[index];
          app.projectItem(project);

        }

      })
      .catch(function (error) {
        //app.displayError(error);
        console.log(error);
      })
      .finally(function () {
      });
  },
  projectItem: async function (project) {

    const dataTitle = project.title.rendered;
    const dataContent = project.content.rendered;
    const dataGitHub = project.acf.github;

    //.skill__project__container
    const projectContainer = document.createElement('div');
    projectContainer.classList.add('skill__project__container');

    //.project__info__container
    const articleInfo = document.createElement('article');
    articleInfo.classList.add('project__info__container');

    //.project__title
    const projectTitle = document.createElement('div');
    projectTitle.classList.add('project__title');

    //h3
    const h3 = document.createElement('h3');
    h3.innerText = dataTitle;

    //.project__content
    const projectContent = document.createElement('p');
    projectContent.classList.add('project__content');
    projectContent.innerHTML = dataContent;

    //.project__techno
    const projetTechno = document.createElement('p');
    projetTechno.classList.add('project__techno');

    const spanTechno = document.createElement('span');
    projetTechno.appendChild(spanTechno);
    spanTechno.classList.add('techno__title');
    spanTechno.innerText = "Technologies : ";

    // Affichage des techno du projet
    await app.loadTechnoItem(project, projetTechno);
    



    //container de base 
    const htmlProjet = document.querySelector('#skill__project');
    htmlProjet.appendChild(projectContainer);

    projectContainer.appendChild(articleInfo);
    articleInfo.appendChild(projectTitle);
    projectTitle.appendChild(h3);
    projectTitle.appendChild(projectContent);
    projectTitle.appendChild(projetTechno);

    let projectGithub;
    //.project__github
    if (dataGitHub) {

      projectGithub = document.createElement('p');
      projectGithub.classList.add('project__github');
      const linkGit = document.createElement('a');
      linkGit.href = '#';
      linkGit.innerHTML = '<i class="fa fa-github" aria-hidden="true"></i>';
      linkGit.append(" Lien GitHub du dossier");
      linkGit.target = '_blank';
      projectGithub.appendChild(linkGit);

      //ajout dans le DOM
      projectTitle.appendChild(projectGithub);
    }

    

  },

  loadTechnoItem: async function (project, projetTechno) {

    const technos = project.techno;

    for (let i = 0; i < technos.length; i++) {
      await axios.get(app.baseUrl + app.jsonUrl + 'techno/' + technos[i])
        .then(function (response) {
          const technoName = response.data.name;

          // Je remplis "Technologies" par chaque techno de mon tableau
          if (i === technos.length - 1) {
            projetTechno.append(technoName);
          }
          else {
            projetTechno.append(technoName + ", ");
          }
        })
        .catch(function (error) {
          //app.displayError(error);
          console.log(error);
        })
        .finally(function () {
        });
    }
  },
};

app.init();
