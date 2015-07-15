# Front-End Documentation for Slac Today

* Information on theme and front-end configuration *

## Table of Contents

  1. [Theme’s front-end tools setup](#markdown-header-themes-front-end-tools-setup)
  1. [Watching for Sass changes](#markdown-header-watching-for-sass-changes)
  1. [Theme's structure and organization](#markdown-header-themes-structure-and-organization)
  1. [Grid and Layout](#markdown-header-grid-and-layout)

## Theme’s front-end tools setup

Slac Today's Drupal theme can be found under `/docroot/sites/all/themes/slac`.  In here you will find theme's and fron-end confirguations which we will cover in this documentation.


The following ruby gems are part of this theme:

  [Bundler](http://bundler.io), [Sass 3.4.9](http://sass-lang.com/), [Compass 1.0.1](http://compass-style.org/), [Breakpoint 2.5.0](http://breakpoint-sass.com/), [Zen-grids 1.4](http://zengrids.com/), [Toolkit](https://github.com/at-import/toolkit)

Each gems above can be installed by running `gem install gem-name` (i.e. `gem install sass`, `gem install bundler`, etc.)



  - **Bundler**
Bundler provides a consistent environment for Ruby projects by tracking and installing the exact gems and versions that are needed. Using different versions of ruby gems could create Sass compilation errors that could result in your project not properly rendering in the browser.



  - **Sass**
Sass is a preprocessor for writing more efficient and advanced CSS.  Sass provides many advantages over generic CSS that improves the process of writing CSS as well as how your project's stylesheets are organized for a more modular approach to theming.



  - **Compass**
Compass goes hand-in-hand with Sass.  Compass is a css authoring system that allows for compilation of CSS in addition to other advanced tools and mixing we can take advantage of in our Sass files.



  - **Toolkit**
Toolkit a collection of tools we can use on our project.  Some of the tools include clearfix, color mixings, font mixings, etc.



  - **Zen Grids**
Zen Grids is the grid system of choice for this project.  This is a dynamic grid that can be used with Sass for layout the structure of our website.



  - Building your own grid with zen grids is easy, create a new Sass partial (i.e. _grid.scss), and specify your grid's properties:
```
// Set the total number of columns in the grid.
$zen-column-count: 7;

// Set the gutter size. A half-gutter is used on each side of each column.
$zen-gutter-width: 10px;

// Apply this mixin to the container.
.container {
 @include zen-grid-container;
}

// Apply this mixin for each grid item in the container.
.aside1 {
 @include zen-grid-item(2, 1);
```

**[⬆ back to top](#markdown-header-table-of-contents)**


A more efficient way for ensuring all ruby gems are up to date is to include them in a Gemfile which bundler would look at to ensure consistency.  This is an example of the Gemfile used on this project:
```
source 'https://rubygems.org'

group :development do

  # Sass, Compass and extensions.
  gem 'sass', '3.4.9'           # Sass.
  gem 'compass', '1.0.1'        # Framework built on Sass.
  gem 'toolkit'                 # Compass utility from the fabulous Snugug.
  gem 'breakpoint', '2.5.0'     # Manages CSS media queries.
  gem 'zen-grids', '1.4'        # Zen-Grids gem.

end
```

The Gemfile is saved in the root location of your theme `(i.e. /docroot/sites/all/themes/slac/Gemfile)

Once your gemfile is in place, you need to navigate to your theme's location (i.e. /docroot/sites/all/themes/slac/), and run `bundle install`.  Bundler will read your Gemfile and ensure the ruby versions specified in it are installed for this project.  Ruby versions can vary from project to project and that's another advantage of using Bundler as it will always ensure the right versions are installed on yoru project based on what is found in your Gemfile.

**[⬆ back to top](#markdown-header-table-of-contents)**

## Watching for Sass changes

Once your gems are in place by either of the methods above, you can start watching for Sass changes.

  - Navigate to your theme's location (i.e. /docroot/sites/all/themes/slac/)

  - run `bundle exec compass watch`

Using Bundler for compiling CSS ensures that our ruby gems are in sync with our Gemfile specifications.


## Theme's structure and organization

Thanks to Sass we can provide better structure and organization of our theme's stylesheets.  By modulizing as many of the site's elements as possible, we are able to create individual Sass partials that are easy to maintain in the long run.

The slac theme is currently structured as follows:

```
css/
images/
js/
sass/
|
|– base/
|   |– _base.scss
|   |– _colors.scss
|   |- _quotes.scss
|   |- _tables.scss
|   |- _typography.scss
|
|– components/
|   |- _access-notice-listings.scss
|   |- _author.scss
|   |– _buttons.scss
|   |- _calendar-events-by-color.scss
|   |- _calendar-filters-dropdown.scss
|   |- _calendar-mobile.scss
|   |- _calendar-overlap.scss
|   |- _calendar.scss
|   |- _captions.scss
|   |- _collapsible-content.scss
|   |- _date.scss  #Date's module legacy styles modified for this project
|   |- _event-news-access-notice-mobile.scss
|   |- _event-news-access-notice.scss
|   |- _events-legend.scss
|   |- _featured-news.scss
|   |- _feed-icon.scss
|   |- _feedback.scss
|   |- _flag.scss
|   |- _flea-market.scss
|   |- _footer.scss
|   |- _form-components.scss
|   |- _frontpage-access-information.scss
|   |- _frontpage-content-blocks.scss
|   |- _frontpage-gold-headings.scss
|   |- _frontpage-help-market-security-contacts.scss
|   |- _frontpage-lab-news.scss
|   |- _frontpage-lists.scss
|   |- _frontpage-people-finder.scss
|   |- _frontpage-slac-projects.scss
|   |- _frontpage-slac-science.scss
|   |- _frontpage-slider.scss
|   |- _frontpage-social-icons.scss
|   |- _frontpage-upcoming-events.scss
|   |- _frontpage-views-footer.scss
|   |- _frontpage.scss
|   |- _header.scss
|   |- _icons.scss
|   |- _listing-blocks.scss
|   |- _lists.scss
|   |- _my-content.scss
|   |- _navigation.scss
|   |- _news-archives.scss
|   |- _page-icons.scss
|   |- _pager.scss
|   |- _scroll-to-top.scss
|   |– _search.scss
|   |- _sidebar.scss
|   |- _taxonomy-listing.scss
|
|– layout/
|   |– _layout.scss
|
|– utilities/
|   |– _breakpoints.scss
|   |– _events-color-legend.scss
|   |– _mixins.scss
|
|- main.scss
|
```
**base/**: The base directory is intended to hold partials that address styles at a very high level.  Elements addressed in the base directory normally don't have IDs or classes associated with them.

**components/**: Also known as modules, this directory contains partials reserved for reusable UI patterns. A general rule of thumb, anytime you find yourself needing the same CSS more than once, you should modularize it. As your project matures, you should be able to compartmentalize more CSS into modules.

**layout/**:  Partials in this directory target the layout or structure of your theme’s regions.  Definitions for regions' widths or how many grid columns a particular region spans.

**utilities/**: Mixins, variables, breakpoints and functions are usually found in this directory in addition to other custom or third party utilities.

**main.scss**: This partial's only function is to compile a list of all other partials to be imported into the project.  Instead of writing `@import` statements in different partials, combining all partials in the order they are required for the project to run properly makes more sense.


**[⬆ back to top](#markdown-header-table-of-contents)**

## Grid and layout

The site's grid is configured to use 12 columns.  The site's layout structure is defined in `layouts/_layout.scss` as follows:
```css
.l-main {
  @include zen-grid-item(12, 1);
  max-width: 1432px;
  padding-top: 37px;

  @include breakpoint($tablet-large) {
    padding-top: 47px;

    .page-calendar & {
      padding-top: 0;
    }
  }
}
```

  - `@include zen-grid-item(12, 1)`: Grid spans 12 columns starting on column 1.
  - `max-width: 1432px`: The site's width should not exceed 1432px.
  - `padding-top: 37px`: provides default padding for all pages on mobile.  This increases to 47px on large screens.
  - The dimensions above apply to all device sizes from smartphones to desktops.

The homepage is broken down in three columns:
```
.front-main-column
.front-first-column
.front-last-column
```

Pages that are broken down in two columns look like this:
```
.general-two-col

    .general-left

    .general-right
```

One column pages:
`.l-genral-one-col` at 83% the width of .l-main.

All pages default to 1 column at 100% width on mobile devices.

**[⬆ back to top](#markdown-header-table-of-contents)**