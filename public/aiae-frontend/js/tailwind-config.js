/**
 * AIAE — Centralized Tailwind Configuration
 * This file replaces the inline tailwind.config scripts on each page.
 * Modify these colors here to update them project-wide.
 */
window.tailwind = {
  config: {
    theme: {
      extend: {
        fontFamily: {
          futura: ["Futura", "sans-serif"],
          futuraCondensed: ["Futura Condensed", "sans-serif"],
        },
        colors: {
          // Branding Colors
          primary: "#05482C",    // Brand Green
          secondary: "#CC6A00",  // Brand Orange
          darkBlue: "#0E1540",   // Brand Blue (accent/bg)
          
          // UI Helpers
          glass: "rgba(255, 255, 255, 0.55)",
          glassDark: "rgba(255, 255, 255, 0.35)",
        },
        fontWeight: {
          light: "300",
          book: "400",
          normal: "400",
          medium: "500",
          bold: "700",
          heavy: "800",
          extrabold: "900",
          black: "1000",
          ultra: "950",
        },
      },
    },
  }
};
