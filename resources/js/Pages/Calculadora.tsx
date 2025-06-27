import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import type { PageProps } from '@inertiajs/core';
import { Head } from '@inertiajs/react';
import SolarForm from './SolarForm';

type Props = PageProps & { auth: { user: any } };

export default function Dashboard({ auth }: Props) {
    return (
        <>
            <Head title="Simulador Solar" />
            <AuthenticatedLayout header="Simulador Solar">
                <div className="relative min-h-screen items-center justify-center bg-gray-100">
                    <SolarForm />
                </div>
            </AuthenticatedLayout>
        </>
    );
}

// opcional, se usar layout via Page.layout
Dashboard.layout = (page: any) => page;
