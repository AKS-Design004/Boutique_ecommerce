/**
 * Image Optimizer - Script pour optimiser le chargement des images
 */

class ImageOptimizer {
    constructor() {
        this.observer = null;
        this.init();
    }

    init() {
        // Observer pour le lazy loading
        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.loadImage(entry.target);
                    this.observer.unobserve(entry.target);
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.1
        });

        // Observer pour les images avec data-src
        this.observeLazyImages();
        
        // Preload des images importantes
        this.preloadCriticalImages();
    }

    observeLazyImages() {
        const lazyImages = document.querySelectorAll('img[data-src]');
        lazyImages.forEach(img => {
            this.observer.observe(img);
        });
    }

    loadImage(img) {
        if (img.dataset.src) {
            img.src = img.dataset.src;
            img.classList.remove('lazy');
            img.classList.add('loaded');
        }
    }

    preloadCriticalImages() {
        // Preload des images de la première page
        const criticalImages = document.querySelectorAll('.hero img, .featured img');
        criticalImages.forEach(img => {
            if (img.src) {
                const link = document.createElement('link');
                link.rel = 'preload';
                link.as = 'image';
                link.href = img.src;
                document.head.appendChild(link);
            }
        });
    }

    // Optimiser les images existantes
    optimizeExistingImages() {
        const images = document.querySelectorAll('img:not([data-src])');
        images.forEach(img => {
            // Ajouter lazy loading si pas déjà présent
            if (!img.loading) {
                img.loading = 'lazy';
            }
            
            // Ajouter des attributs de performance
            img.decoding = 'async';
            
            // Ajouter un placeholder si pas d'image
            if (!img.src || img.src === '') {
                img.classList.add('placeholder');
            }
        });
    }

    // Créer un placeholder animé
    createPlaceholder(container) {
        const placeholder = document.createElement('div');
        placeholder.className = 'image-placeholder animate-pulse bg-gradient-to-r from-gray-200 to-gray-300';
        placeholder.innerHTML = `
            <div class="flex items-center justify-center h-full">
                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        `;
        container.appendChild(placeholder);
    }

    // Optimiser les images de produits
    optimizeProductImages() {
        const productImages = document.querySelectorAll('.product-image');
        productImages.forEach(img => {
            // Ajouter des tailles responsives
            if (img.src && !img.srcset) {
                const baseSrc = img.src;
                const srcset = [
                    `${baseSrc.replace('.jpg', '_thumb.jpg')} 150w`,
                    `${baseSrc.replace('.jpg', '_small.jpg')} 300w`,
                    `${baseSrc.replace('.jpg', '_medium.jpg')} 600w`,
                    `${baseSrc.replace('.jpg', '_large.jpg')} 800w`
                ].join(', ');
                
                img.srcset = srcset;
                img.sizes = '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw';
            }
        });
    }
}

// Initialiser l'optimiseur d'images
document.addEventListener('DOMContentLoaded', () => {
    window.imageOptimizer = new ImageOptimizer();
    
    // Optimiser les images existantes
    window.imageOptimizer.optimizeExistingImages();
    window.imageOptimizer.optimizeProductImages();
});

// Optimiser les images lors du changement de page (pour les SPAs)
document.addEventListener('turbolinks:load', () => {
    if (window.imageOptimizer) {
        window.imageOptimizer.optimizeExistingImages();
        window.imageOptimizer.optimizeProductImages();
    }
});

// Fonction utilitaire pour créer une image optimisée
function createOptimizedImage(src, alt, classes = '') {
    const img = document.createElement('img');
    img.src = src;
    img.alt = alt;
    img.className = classes;
    img.loading = 'lazy';
    img.decoding = 'async';
    
    // Ajouter srcset si disponible
    if (src.includes('_medium.jpg')) {
        const baseSrc = src.replace('_medium.jpg', '');
        img.srcset = [
            `${baseSrc}_thumb.jpg 150w`,
            `${baseSrc}_small.jpg 300w`,
            `${baseSrc}_medium.jpg 600w`,
            `${baseSrc}_large.jpg 800w`
        ].join(', ');
        img.sizes = '(max-width: 640px) 100vw, (max-width: 1024px) 50vw, 33vw';
    }
    
    return img;
} 