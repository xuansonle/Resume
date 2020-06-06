<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <!-- <link rel="stylesheet" type="text/css" href="css/normalize.css" /> -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet" />
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" type="text/css" href="css/style.css" /> -->
  <style>
    @page {
      size: letter portrait;
      margin: 0;
    }

    * {
      box-sizing: border-box;
    }

    :root {
      --page-width: 8.3in;
      --page-height: 11.7in;
      --main-width: 6.2in;
      --sidebar-width: calc(var(--page-width) - var(--main-width));
      --decorator-horizontal-margin: 0.18in;

      --sidebar-horizontal-padding: 0.2in;

      /* XXX: using px for very good precision control */
      --decorator-outer-offset-top: 10px;
      --decorator-outer-offset-left: -5.2px;
      --decorator-border-width: 1px;
      --decorator-outer-dim: 9px;
      --decorator-border: 1px solid #ccc;

      --row-blocks-padding-top: 5pt;
      --date-block-width: 0.6in;

      --main-blocks-title-icon-offset-left: -19pt;
    }

    body {
      width: var(--page-width);
      height: var(--page-height);
      margin: 0;
      font-family: "Open Sans", sans-serif;
      font-weight: 300;
      line-height: 1.3;
      color: #444;
      hyphens: auto;
    }

    #cv-image-div {
      text-align: center;
    }

    #cv-image {
      width: 100pt;
      height: auto;
    }

    h1,
    h2,
    h3 {
      margin: 0;
      color: #000;
    }

    li {
      list-style-type: none;
    }

    a {
      color: #1e407c;
    }

    #main {
      float: left;
      width: var(--main-width);
      padding: 0.25in 0.25in 0 0.25in;
      font-size: 8.5pt;
    }

    #sidebar {
      float: right;
      position: relative;
      width: var(--sidebar-width);
      height: 100%;
      padding: 0.6in var(--sidebar-horizontal-padding);
      padding-top: 5pt;
      background-color: #f2f2f2;
      font-size: 8.5pt;
    }

    /* main */

    /** big title **/
    #title,
    h1,
    h2 {
      text-transform: uppercase;
      font-weight: bold;
    }

    #title {
      position: relative;
      left: 0.55in;
      margin-bottom: 0.1in;
      line-height: 1.2;
    }

    #title h1 {
      font-weight: 300;
      font-size: 18pt;
      line-height: 1.5;
    }

    #title h1 strong {
      margin: auto 2pt auto 4pt;
      font-weight: 600;
    }

    .subtitle {
      font-size: 10pt;
    }

    /*** categorial blocks ***/

    .main-block {
      margin-top: 0.1in;
    }

    #main h2 {
      position: relative;
      top: var(--row-blocks-padding-top);
      /* XXX: 0.5px for aligning fx printing */
      left: calc((var(--date-block-width) + var(--decorator-horizontal-margin)));
      font-weight: 400;
      font-size: 11pt;
      color: #343a40;
    }

    #main h2>i {
      /* use absolute position to prevent icon's width from misaligning title */
      /* assigning a fixed width here is no better due to needing to align decorator
     line too */
      position: absolute;
      left: var(--main-blocks-title-icon-offset-left);
      z-index: 1;
      /* over decorator line */
      color: #444;
    }

    #main h2::after {
      /* extends the decorator line */
      height: calc(var(--row-blocks-padding-top) * 2);
      position: relative;
      top: calc(-1 * var(--row-blocks-padding-top));
      /* XXX: 0.5px for aligning fx printing */
      left: calc(-1 * var(--decorator-horizontal-margin));
      display: block;
      border-left: var(--decorator-border);
      z-index: 0;
      line-height: 0;
      font-size: 0;
      content: " ";
    }

    /**** minor tweaks on the icon fonts ****/
    #main h2>.fa-graduation-cap {
      left: calc(var(--main-blocks-title-icon-offset-left) - 1pt);
      top: 2pt;
    }

    #main h2>.fa-suitcase {
      left: calc(var(--main-blocks-title-icon-offset-left) + 0.5pt);
      top: 1pt;
    }

    #main h2>.fa-folder-open {
      top: 1.5pt;
    }

    /**** individual row blocks (date - decorator - details) ****/

    .blocks {
      display: flex;
      flex-flow: row nowrap;
    }

    .blocks>div {
      padding-top: var(--row-blocks-padding-top);
    }

    .date {
      flex: 0 0 var(--date-block-width);
      padding-top: calc(var(--row-blocks-padding-top) + 2.5pt) !important;
      padding-right: var(--decorator-horizontal-margin);
      font-size: 7pt;
      text-align: right;
      line-height: 1;
    }

    .date span {
      display: block;
    }

    .date span:nth-child(2)::before {
      position: relative;
      top: 1pt;
      right: 11.5pt;
      display: block;
      height: 10pt;
      content: "|";
    }

    .decorator {
      flex: 0 0 0;
      position: relative;
      width: 2pt;
      min-height: 100%;
      border-left: var(--decorator-border);
    }

    /*
 * XXX: Use two filled circles to achieve the circle-with-white-border effect.
 * The normal technique of only using one pseudo element and
 * border: 1px solid white; style makes firefox erroneously either:
 * 1) overflows the grayshade background (if no background-clip is set), or
 * 2) shows decorator line which should've been masked by the white border
 *
 */

    .decorator::before {
      position: absolute;
      top: var(--decorator-outer-offset-top);
      /* left: var(--decorator-outer-offset-left); */
      content: " ";
      display: block;
      width: var(--decorator-outer-dim);
      height: var(--decorator-outer-dim);
      border-radius: calc(var(--decorator-outer-dim) / 2);
      background-color: #fff;
    }

    .decorator::after {
      position: absolute;
      top: calc(var(--decorator-outer-offset-top) + var(--decorator-border-width));
      left: calc(var(--decorator-outer-offset-left) + var(--decorator-border-width) + 0.18px);
      content: " ";
      display: block;
      width: calc(var(--decorator-outer-dim) - (var(--decorator-border-width) * 2));
      height: calc(var(--decorator-outer-dim) - (var(--decorator-border-width) * 2));
      border-radius: calc((var(--decorator-outer-dim) - (var(--decorator-border-width) * 2)) / 2);
      background-color: #555;
    }

    /* .blocks:last-child .decorator{ 
  margin-bottom: 0.25in;
} */

    /***** fine-tunes on the details block where the real juice is *****/

    .details {
      flex: 1 0 0;
      padding-left: var(--decorator-horizontal-margin);
      padding-top: calc(var(--row-blocks-padding-top) - 0.5pt) !important;
      /* not sure why but this is needed for better alignment */
    }

    .details header {
      color: #000;
    }

    .details h3 {
      font-size: 9pt;
    }

    .main-block:not(.concise) .details div {
      margin: 0.18in 0 0.1in 0;
    }

    .main-block:not(.concise) .blocks:last-child .details div {
      margin-bottom: 0;
    }

    .main-block.concise .details div:not(.concise) {
      /* use padding to work around the fact that margin doesn't affect floated
     neighboring elements */
      padding: 0.05in 0 0.07in 0;
    }

    .details .place {
      float: left;
      font-size: 7.5pt;
    }

    .place {
      color: #1e407c;
      font-weight: 400;
    }

    .details .location {
      float: right;
    }

    /* #hanoi {
  position: relative;
  bottom: 15px !important;
} */

    .details div {
      clear: both;
    }

    .details .location::before {
      display: inline-block;
      position: relative;
      right: 3pt;
      top: 0.25pt;
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      text-decoration: inherit;
      content: "\f041";
    }

    /***** fine-tunes on the lists... *****/

    #main ul {
      padding-left: 0.07in;
      margin: 0.08in 0;
    }

    #main li {
      margin: 0 0 0.025in 0;
    }

    /****** customize list symbol style ******/
    #main li::before {
      position: relative;
      margin-left: -4.25pt;
      content: "◆ ";
    }

    .details .concise ul {
      margin: 0 !important;
      -webkit-columns: 2;
      -moz-columns: 2;
      columns: 2;
    }

    .details .concise li {
      margin: 0 !important;
    }

    .details .concise li {
      margin-left: 0 !important;
    }

    /* sidebar */

    #sidebar h1 {
      font-weight: 400;
      font-size: 11pt;
    }

    .side-block {
      margin-top: 0.3in;
    }

    .info-icon {
      margin-right: 2pt;
    }

    #contact {
      margin-top: 15pt;
    }

    #contact ul {
      margin-top: 0.05in;
      padding-left: 0;
      font-family: "Source Code Pro";
      font-weight: 400;
      line-height: 1.75;
    }

    #contact li>i {
      width: 9pt;
      /* for text alignment */
      text-align: right;
    }

    a {
      text-decoration: none;
    }

    #mail {

      color: inherit;
      text-decoration: none;
    }

    #skills {
      line-height: 1.5;
    }

    #skills ul {
      margin: 0.05in 0 0.15in;
      padding: 0;
    }
  </style>
</head>

<body lang="en">
  <section id="main">
    <header id="title">
      <h1>Xuan Son Le</h1>
      <!-- <span class="subtitle">Data Scientist</span> -->
    </header>

    <section class="main-block">
      <h2>
        <i class="fa fa-suitcase"></i> Experiences
      </h2>
      <section class="blocks">
        <div class="date">
          <span>now&nbsp;&nbsp;&nbsp;</span><span>03/2019</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Data Scientist & BI Developer</h3>
            <a target="_blank" rel="noopener noreferrer" href="https://www.k-newmedia.de/k-new-media/ueber-uns/"><span
                class="place">K-New Media GmbH</span></a>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>ETL: Building pipelines to collect, tidy & wrangle data</li>
              <li>Creating & maintaining automated reports & dashboards</li>
              <li>Automating various data-related tasks for other teams</li>
              <li>Developing & maintaining databases</li>
              <li>Implementing end-to-end Machine Learning models: sales prediction, customer churn, customer cluster
              </li>
              <li>Tools: Python, PostgreSQL, MicroStrategy, Git</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span>02/2019</span><span>06/2018</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Data Analyst</h3>
            <a target="_blank" rel="noopener noreferrer" href="https://www.fastlane-automotive.de/"><span
                class="place">Fastlane Automotive GmbH</span></a>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>ETL: Building pipelines to collect, tidy & wrangle data</li>
              <li>Implementing automated reports</li>
              <li>Visualizing data & maintain dashboards</li>
              <li>Providing ad-hoc analyses on sales & customer data</li>
              <li>Performing time series analysis on multiple KPIs</li>
              <li>Applying cluster analysis in customer segmentation</li>
              <li>Designing & evaluating pricing models</li>
              <li>Tools: R, Python, MySQL, Google Analytics, PHP, Git</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span>06/2018</span><span>12/2017</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Business Intelligence Analyst (Part time)</h3>
            <a target="_blank" rel="noopener noreferrer" href="https://www.classmarkets.com/classmarkets/ueber/"><span
                class="place">Classmarkets GmbH</span></a>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>Managing & analysing publisher-related data</li>
              <li>Creating & maintaining automated reports</li>
              <li>Applying cluster analysis in customer segmentation</li>
              <li>Performing time series analysis on multiple KPIs</li>
              <li>Tools: Excel VBA, R, Python, Pentaho, Google Analytics</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span>05/2018</span><span>01/2018</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Data Analyst (Part time)</h3>
            <a target="_blank" rel="noopener noreferrer" href="https://www.wido.de/institut-team/about-wido/"><span
                class="place">AOK Research Institute</span></a>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>Maintaining & evaluating nationwide insurance data</li>
              <li>Maintaining automated data analysis process</li>
              <li>Monitoring data quality</li>
              <li>Tools: Excel VBA, Toad for Oracle</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- <section class="blocks">
        <div class="date">
          <span>2015&ensp;</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>IT Support (part time)</h3>
            <a target="_blank" rel="noopener noreferrer" href="https://www.wiwiss.fu-berlin.de/en/index.html"><span
                class="place">Free University of Berlin</span></a>
            <span class="location">Berlin, Germany</span>
          </header>

        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span>2013&ensp;</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Student Accountant</h3>
            <a target="_blank" rel="noopener noreferrer" href="https://www.aiesec.de/"><span class="place">AIESEC
                Germany</span></a>
            <span class="location">Berlin, Germany</span>
          </header>

        </div>
      </section> -->

    </section>
    <!-- <section class="main-block">
        <h2>
          <i class="fa fa-folder-open"></i> Selected Projects
        </h2>
        <section class="blocks">
          <div class="date">
            <span>2015</span><span>2016</span>
          </div>
          <div class="decorator">
          </div>
          <div class="details">
            <header>
              <h3>Some Project 1</h3>
              <span class="place">Some workplace</span>
            </header>
            <div>
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec mi ante. Etiam odio eros, placerat eu metus id, gravida eleifend odio. Vestibulum dapibus pharetra odio, egestas ullamcorper ipsum congue ac</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec mi ante. Etiam odio eros, placerat eu metus id, gravida eleifend odio</li>
              </ul>
            </div>
          </div>
        </section>
        <section class="blocks">
          <div class="date">
            <span>2014</span><span>2015</span>
          </div>
          <div class="decorator">
          </div>
          <div class="details">
            <header>
              <h3>Some Project 2</h3>
              <span class="place">Some workplace</span>
            </header>
            <div>
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec mi ante. Etiam odio eros, placerat eu metus id, gravida eleifend odio. Vestibulum dapibus pharetra odio, egestas ullamcorper ipsum congue ac. Maecenas viverra tortor eget convallis vestibulum. Donec pulvinar venenatis est, non sollicitudin metus laoreet sed. Fusce tincidunt felis nec neque aliquet porttitor</li>
              </ul>
            </div>
          </div>
        </section>
        <section class="blocks">
          <div class="date">
            <span>2014</span>
          </div>
          <div class="decorator">
          </div>
          <div class="details">
            <header>
              <h3>Some Project 3</h3>
              <span class="place">Some workplace</span>
            </header>
            <div>
              <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nec mi ante. Etiam odio eros, placerat eu metus id, gravida eleifend odio</li>
              </ul>
            </div>
          </div>
        </section>
      </section> -->
    <section class="main-block concise">
      <h2>
        <i class="fa fa-graduation-cap"></i> Education
      </h2>
      <section class="blocks">
        <div class="date">
          <span>10/2018</span><span>10/2016</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>M.Sc. Business Computing</h3>
            <span class="place">Free University of Berlin</span>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>Majoring in data mining, predictive modelling & business intelligence</li>
              <li>Thesis: Application of logistic regression & support vector machine in
                multidimensional poverty classification</li>
              <li>GPA: 1.5/1.0 (92/100)</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span>10/2016</span><span>10/2013</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>B.Sc. Business Administration</h3>
            <span class="place">Free University of Berlin</span>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>Majoring in statistical programming, business computing</li>
              <li>GPA: 2.3/1.0 (78/100)</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span>10/2016</span><span>10/2013</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Studienkolleg</h3>
            <span class="place">Free University of Berlin</span>
            <span class="location">Berlin, Germany</span>
          </header>
          <div>
            <ul>
              <li>Majoring in economics</li>
              <li>GPA: 1.6/1.0 (90/100)</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blocks">
        <div class="date">
          <span> 2010&nbsp;&nbsp;&nbsp;</span><span>1998&nbsp;&nbsp;&nbsp;</span>
        </div>
        <div class="decorator">
        </div>
        <div class="details">
          <header>
            <h3>Primary and secondary education</h3>
            <!-- <span class="place">Free University of Berlin</span> -->
            <span class="location" id="hanoi">Hanoi, Vietnam</span>
          </header>
      </section>
    </section>
  </section>
  <aside id="sidebar">

    <div id="cv-image-div">
      <img id="cv-image" src="image/transparent.png" />
    </div>



    <div class="side-block" id="contact">
      <h1>
        PERSONAL DETAILS
      </h1>
      <ul>
        <li><i class="fa fa-birthday-cake info-icon"></i> 30/11/1992 in Hanoi, Vietnam</li>
        <li><i class="fa fa-home info-icon"></i> c/o Phan Ngoc<br />&emsp;&nbsp;Köthener Straße
          13<br />&emsp;&nbsp;12689 Berlin
        </li>
        <li><i class="fa fa-phone info-icon"></i> 0176 8728 1834</li>
        <li><i class="fa fa-globe info-icon"></i> <a target="_blank" rel="noopener noreferrer"
            href="https://xuanson-le.herokuapp.com">xuanson-le.herokuapp.com</a></li>
        <li><i class="fa fa-linkedin info-icon"></i> <a target="_blank" rel="noopener noreferrer"
            href="https://linkedin.com/in/xuansonle">linkedin.com/in/xuansonle</a></li>
        <li><i class="fa fa-envelope info-icon"></i> <a id="mail"
            href="mailto:lexuanson1992@gmail.com">lexuanson1992@gmail.com</a></li>

      </ul>
    </div>
    <div class="side-block" id="skills">
      <h1>
        EXPERTISE
      </h1>
      <ul>
        <li>Data Analysis</li>
        <li>Predictve Modeling</li>
        <li>Machine Learning</li>
        <li>Deep Learning</li>
        <li>Computer Vision</li>
        <li>Web Development</li>
      </ul>
    </div>
    <div class="side-block" id="skills">
      <h1>
        PROGRAMMING
      </h1>
      <ul>
        <li>Python</li>
        <li>R</li>
        <li>SQL</li>
        <li>Javascript (ReactJS)</li>
      </ul>
    </div>
    <div class="side-block" id="skills">
      <h1>
        SKILLS
      </h1>
      <ul>
        <li>Flask</li>
        <li>Django</li>
        <li>OpenCV</li>
        <li>Dash</li>
        <li>Plotly</li>
        <li>Scikit-learn</li>
        <li>Tensorflow (Keras)</li>
        <li>Selenium</li>
      </ul>
    </div>
    <div class="side-block" id="skills">
      <h1>
        OTHER
      </h1>
      <ul>
        <li>Git</li>
        <li>Excel VBA</li>
        <li>Tableau</li>
        <li>Microstrategy</li>
        <li>KNIME</li>
      </ul>
    </div>
    <div class="side-block" id="skills">
      <h1>
        LANGUAGES
      </h1>
      <ul>
        <li>German: C2</li>
        <li>English: C1</li>
        <li>Vietnamese: Native</li>
      </ul>
    </div>
  </aside>
  <script src="https://use.fontawesome.com/23e400c653.js"></script>
</body>

</html>