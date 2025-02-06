module.exports = {
    content: [
        './resources/**/*.blade.php', // Include all Blade files
        './resources/**/*.js',       // Include JavaScript files
        './resources/**/*.vue',      // Include Vue files (if applicable)
    ],
    theme: {
        extend: {
            // Custom Colors
            colors: {
                primary: '#4299e1', // Blue
                secondary: '#38b2ac', // Teal
                success: '#38a169', // Green
                danger: '#e53e3e', // Red
                warning: '#f6ad55', // Orange
                info: '#63b3ed', // Light Blue
                dark: '#1a202c', // Dark Gray
                light: '#f7fafc', // Light Gray
            },

            // Custom Font Sizes
            fontSize: {
                xs: '0.75rem',
                sm: '0.875rem',
                base: '1rem',
                lg: '1.125rem',
                xl: '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
                '5xl': '3rem',
                '6xl': '4rem',
            },

            // Custom Spacing
            spacing: {
                '1': '0.25rem',
                '2': '0.5rem',
                '3': '0.75rem',
                '4': '1rem',
                '5': '1.25rem',
                '6': '1.5rem',
                '8': '2rem',
                '10': '2.5rem',
                '12': '3rem',
                '16': '4rem',
                '20': '5rem',
                '24': '6rem',
                '32': '8rem',
                '48': '12rem',
                '64': '16rem',
                '128': '32rem',
            },

            // Custom Font Families
            fontFamily: {
                sans: ['Nunito', 'sans-serif'], // Default font
                mono: ['Courier New', 'monospace'], // Monospaced font
            },

            // Custom Typography
            typography: {
                DEFAULT: {
                    css: {
                        color: '#4a5568', // Default text color
                        a: {
                            color: '#4299e1', // Link color
                            textDecoration: 'underline', // Underline links
                            fontWeight: 'normal', // Normal font weight for links
                            transition: 'color 0.15s ease-in-out', // Smooth hover effect
                            '&:hover': {
                                color: '#2a67a4', // Hover link color
                            },
                        },
                        h1: {
                            fontSize: '2rem', // Customize h1 font size
                            fontWeight: 'bold', // Bold font weight for h1
                            marginTop: '1.5rem', // Add margin-top for h1
                            marginBottom: '1rem', // Add margin-bottom for h1
                        },
                        h2: {
                            fontSize: '1.5rem', // Customize h2 font size
                            fontWeight: 'bold', // Bold font weight for h2
                            marginTop: '1.25rem', // Add margin-top for h2
                            marginBottom: '0.75rem', // Add margin-bottom for h2
                        },
                        p: {
                            fontSize: '1rem', // Customize paragraph font size
                            lineHeight: '1.75rem', // Add line height for paragraphs
                            marginBottom: '1rem', // Add margin-bottom for paragraphs
                        },
                    },
                },
            },

            // Custom Shadows
            boxShadow: {
                'sm': '0 1px 2px rgba(0, 0, 0, 0.05)', // Small shadow
                'md': '0 4px 6px rgba(0, 0, 0, 0.1)', // Medium shadow
                'lg': '0 8px 12px rgba(0, 0, 0, 0.15)', // Large shadow
            },

            // Custom Borders
            borderWidth: {
                DEFAULT: '1px',
                '0': '0px',
                '2': '2px',
                '4': '4px',
                '8': '8px',
            },

            // Custom Background Opacity
            backgroundOpacity: {
                '5': '0.05',
                '10': '0.1',
                '20': '0.2',
                '30': '0.3',
                '40': '0.4',
                '50': '0.5',
                '60': '0.6',
                '70': '0.7',
                '80': '0.8',
                '90': '0.9',
            },

            // Custom Text Opacity
            textOpacity: {
                '5': '0.05',
                '10': '0.1',
                '20': '0.2',
                '30': '0.3',
                '40': '0.4',
                '50': '0.5',
                '60': '0.6',
                '70': '0.7',
                '80': '0.8',
                '90': '0.9',
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'), // Add Tailwind Typography plugin
    ],
};
