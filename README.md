## Build Setup

```bash
# Install dependencies.
npm install

# To watch your JavaScript for changes.
npm run watch

# Build the client application for development.
npm run dev

# Build the client application for production with minification.
npm run production
```

## Quick Installation
1. Clone this repo
2. `cd LVA`
3. `composer install`
4. Copy __.env.example__ file to __.env__ and edit database credentials there
5. Run __composer install__
6. Run __php artisan key:generate__
7. Run __php artisan migrate --seed__
8. Run __npm install__ 
9. Run __php artisan migrate --seed__ to create and populate tables
