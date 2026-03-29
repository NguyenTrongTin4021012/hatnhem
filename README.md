# Hat & Hem

Hat & Hem is a static coffee discovery microsite with three pages:

- `index.html`: palate quiz and generated tasting profile
- `map.html`: cafe explorer map powered by `cafes.json`
- `passport.html`: local profile/passport view stored in browser `localStorage`

## Current stack

- Static HTML, CSS, and JavaScript
- `cafes.json` for cafe data
- CDN libraries: Chart.js, Leaflet, Leaflet MarkerCluster, Google Fonts
- Browser `localStorage` for lightweight client-side state

## Legacy cPanel files

These files came from the old Namecheap cPanel deployment and are not required for GitHub Pages:

- `ai_handler.php`
- `api.php`
- `auth.php`
- `db.php`
- `setup.sql`

GitHub Pages does not run PHP or MySQL, so those files are preserved as legacy reference only.

## GitHub deployment model

This repository is configured to deploy as a static site through GitHub Pages using:

- `.github/workflows/deploy-pages.yml`
- `.nojekyll`

After pushing to the `main` branch, deploy from:

1. GitHub repository `Settings`
2. `Pages`
3. `Build and deployment`
4. `Source: GitHub Actions`

## Result generation on GitHub Pages

The quiz now works fully on GitHub Pages without PHP by generating tasting results in the browser from:

1. The user quiz answers
2. A local scoring model
3. Cafe matching against `cafes.json`

## Notes

- `map.html` and `passport.html` work as static pages.
- `index.html` no longer requires a live API key to return results.
- Relative links are already suitable for GitHub Pages project hosting.
- The Vietnamese text currently has encoding issues in the checked-in HTML files and may be worth cleaning up separately.
