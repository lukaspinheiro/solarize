export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
}

export type PageProps<
    T extends Record<string, unknown> = Record<string, unknown>,
> = T & {
    auth: {
        user: User;
    };
};

// Tipos globais para seu projeto React/Inertia
export interface BreadcrumbItem {
    label?: string;
    title: string;  // Adicione esta nova propriedade
    href: string;
    active?: boolean;
  }
  
