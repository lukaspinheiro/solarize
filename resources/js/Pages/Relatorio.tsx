import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import type { PageProps } from '@inertiajs/core';
import { Head } from '@inertiajs/react';

type Props = PageProps & { auth: { user: any } };

export default function Relatorio() {
    return (
        <AuthenticatedLayout header={<h2 className="text-xl font-semibold leading-tight text-gray-800">Relatorio</h2>}>
            <Head title="Relalorio" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">Inserir dados do Relatório de orçamentos</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
