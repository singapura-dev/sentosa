(function () {
    'use strict';

    /**
     * 导航菜单激活器
     */
    class MenuActivator {
        constructor() {
            this.currentPath = location.pathname;
            this.menuContainer = document.getElementById("navbar-menu");
        }

        /**
         * 初始化激活菜单
         */
        init() {
            if (!this.currentPath || !this.menuContainer) {
                return;
            }

            const activeLink = this.findActiveLink();
            if (activeLink) {
                this.activateMenuHierarchy(activeLink);
            }
        }

        /**
         * 查找活跃的链接元素
         * @returns {Element|null}
         */
        findActiveLink() {
            const links = Array.from(this.menuContainer.querySelectorAll("a[href]"));

            // 优先寻找精确匹配
            let exactMatch = null;
            let partialMatch = null;

            for (const link of links) {
                const href = this.normalizeHref(link.getAttribute('href'));

                if (href === this.currentPath) {
                    exactMatch = link;
                    break;
                }

                // 部分匹配：当前路径以href开头且href不是根路径
                if (href !== '/' && this.currentPath.startsWith(href + '/')) {
                    if (!partialMatch || href.length > this.normalizeHref(partialMatch.getAttribute('href')).length) {
                        partialMatch = link;
                    }
                }
            }

            return exactMatch || partialMatch;
        }

        /**
         * 标准化href路径
         * @param {string} href
         * @returns {string}
         */
        normalizeHref(href) {
            if (!href) return '';

            // 提取绝对URL中的路径部分
            const match = href.match(/^https?:\/\/[^\/]+(.*)$/);
            const path = match ? match[1] || '/' : href;

            // 移除末尾斜杠（除非是根路径）
            return path === '/' ? path : path.replace(/\/$/, '');
        }

        /**
         * 激活菜单层次结构
         * @param {Element} activeLink
         */
        activateMenuHierarchy(activeLink) {
            activeLink.classList.add('active');
            // 激活链接所在的nav-item
            const navItem = activeLink.closest(".nav-item");
            navItem?.classList.add("active");

            const parent_nav = navItem.querySelector(".dropdown-menu");
            parent_nav?.classList.add("show");
        }
    }

    /**
     * 初始化函数
     */
    function initActiveMenu() {
        const menuActivator = new MenuActivator();
        menuActivator.init();
    }

    // 页面加载完成后初始化
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initActiveMenu);
    } else {
        initActiveMenu();
    }

    // 支持SPA路由变化
    window.addEventListener('popstate', initActiveMenu);
})();
