import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';

function getFilesFromDir(dirPath, fileTypes = ['.css', '.scss']) {
  const files = [];
  
  function readDirectory(directory) {
    fs.readdirSync(directory).forEach(file => {
      const filePath = path.join(directory, file);
      const stat = fs.statSync(filePath);

      if (stat.isDirectory()) {
        // Rekursif jika file adalah folder
        readDirectory(filePath);
      } else if (fileTypes.includes(path.extname(file))) {
        // Tambahkan hanya jika file memiliki ekstensi yang sesuai
        files.push(filePath);
      }
    });
  }

  readDirectory(dirPath);
  return files;
}

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
		'resources/assets/vendor/scss/pages/page-auth.scss',
		'resources/assets/vendor/fonts/boxicons.scss',
		'resources/assets/vendor/scss/core.scss',
		'resources/assets/vendor/scss/theme-default.scss',
		'resources/assets/css/demo.css',
		'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.scss',
		'resources/assets/vendor/js/helpers.js',
		'resources/assets/js/config.js',
		'resources/assets/js/pages-account-settings-account.js',
		'resources/assets/vendor/scss/pages/page-misc.scss',
		'resources/assets/js/ui-modals.js',
		'resources/assets/js/ui-toasts.js',
		'resources/assets/js/ui-popover.js',
		'resources/assets/js/main.js',
		'resources/assets/vendor/libs/jquery/jquery.js',
		'resources/assets/vendor/libs/popper/popper.js',
		'resources/assets/vendor/js/bootstrap.js',
		'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
		'resources/assets/vendor/js/menu.js'
            ],
            refresh: true,
        }),
    ],
});
