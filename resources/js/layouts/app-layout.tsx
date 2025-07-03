import { ReactNode } from 'react';

interface AppLayoutProps {
  children: ReactNode;
  breadcrumbs?: any[];
}

export default function AppLayout({ children }: AppLayoutProps) {
  return (
    <div
      className="relative bg-[url('/images/fundo-painel-solar.jpg')] bg-cover bg-center min-h-screen backdrop-blur-sm"
      style={{ backgroundImage: "url('/images/fundo-painel-solar.jpg')" }}
    >
      <div className="absolute inset-0 bg-black/50"></div>

      <div className="relative z-10">
        {children}
      </div>
    </div>
  );
}
