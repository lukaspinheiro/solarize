export default function ApplicationLogo({ className = 'h-10 w-auto' }) {
    return (
        <img 
            src="/apple-touch-icon.png"
            alt="Logo da Aplicação"
            className={className}
        />
    );
}