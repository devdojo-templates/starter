# Starter Tempate

<img src="./thumbnail.png" style="width:100%; height:auto" />

The starter template for DevDojo: a neutral, light marketing site with eight
pages (Home, Features, Pricing, Customers, Changelog, Blog, About and Contact).

It is written in the HTML syntax of
[DevDojo Framework](https://github.com/thedevdojo/framework).

## What is in it

```
public/              served as it is: images, js, favicon.svg, robots.txt
src/
  pages/             one file for each page
    blog/[posts.slug].html         one page for each post
    customers/[stories.slug].html  one page for each story
  components/
    layouts/main.html              the page frame: head, nav, footer
    sections/                      the sections pages are made of
  data/
    site.json                      the nav, the footer, the social links
    collections/*.json             plans, posts, stories, features and the rest
  css/site.css       the theme: colours, type and motion
  design.md          the design notes
template.json        how DevDojo lists the template
thumbnail.png        the picture DevDojo shows for it
```

A page is a list of sections:

```html
<Layout src="main.html" title="Pricing">
    <SectionsPageHeader heading="Simple pricing" />
    <SectionsPricing :plans="plans" />
</Layout>
```

A section is a file in `src/components/sections/`. It names what it takes in
`<Props />`, and the `.yml` beside it says how DevDojo's editor shows those
fields:

```html
<Props heading="Plans that grow with you" />
<section>
    <h2>{heading}</h2>
    <Foreach plans="plan">
        <h3>{plan.name}</h3>
    </Foreach>
</section>
```

## Running it

With the `devdojo` command from DevDojo Framework:

```bash
devdojo serve
```

serves the site at `http://localhost:8000` and reloads the page as you edit.

```bash
devdojo lint .
```

checks every page and prints anything that does not compile.
