@extends('entreprise.layouts.apptest')



@section('content')
    <div class="flex-1 h-screen flex">
        <!-- Conversations Sidebar -->
        <div class="w-80 bg-white border-r border-gray-200 flex flex-col">
            <!-- Header -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Conversations</h2>
                    <button
                        class="w-10 h-10 bg-primary text-white rounded-lg flex items-center justify-center hover:bg-primary/90 !rounded-button whitespace-nowrap">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-add-line"></i>
                        </div>
                    </button>
                </div>
                <!-- Search -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ri-search-line text-gray-400 text-sm"></i>
                    </div>
                    <input type="text" placeholder="Rechercher des contacts..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        id="contactSearch" />
                </div>
            </div>

            <!-- Conversations List -->
            <div class="flex-1 overflow-y-auto">
                <div class="conversation-item flex items-center p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100 bg-primary/5"
                    data-contact="Alexandre Dubois">
                    <div class="relative mr-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-blue-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-medium text-gray-900 truncate">
                                Alexandre Dubois
                            </div>
                            <div class="text-xs text-gray-500">14:32</div>
                        </div>
                        <div class="text-sm text-gray-600 truncate">
                            Merci pour votre retour sur ma candidature...
                        </div>
                    </div>
                    <div class="w-2 h-2 bg-primary rounded-full ml-2"></div>
                </div>

                <div class="conversation-item flex items-center p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100"
                    data-contact="Sophie Martin">
                    <div class="relative mr-3">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-purple-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-medium text-gray-900 truncate">
                                Sophie Martin
                            </div>
                            <div class="text-xs text-gray-500">13:45</div>
                        </div>
                        <div class="text-sm text-gray-600 truncate">
                            Pouvez-vous me donner plus de détails sur le poste ?
                        </div>
                    </div>
                </div>

                <div class="conversation-item flex items-center p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100"
                    data-contact="Pierre Kamga">
                    <div class="relative mr-3">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-green-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-gray-400 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-medium text-gray-900 truncate">
                                Pierre Kamga
                            </div>
                            <div class="text-xs text-gray-500">12:20</div>
                        </div>
                        <div class="text-sm text-gray-600 truncate">
                            Parfait, j'accepte votre proposition !
                        </div>
                    </div>
                </div>

                <div class="conversation-item flex items-center p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100"
                    data-contact="Marie Nkomo">
                    <div class="relative mr-3">
                        <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-red-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-gray-400 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-medium text-gray-900 truncate">
                                Marie Nkomo
                            </div>
                            <div class="text-xs text-gray-500">11:15</div>
                        </div>
                        <div class="text-sm text-gray-600 truncate">
                            Je comprends votre décision. Merci.
                        </div>
                    </div>
                </div>

                <div class="conversation-item flex items-center p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100"
                    data-contact="Jean-Baptiste Fouda">
                    <div class="relative mr-3">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-indigo-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-medium text-gray-900 truncate">
                                Jean-Baptiste Fouda
                            </div>
                            <div class="text-xs text-gray-500">10:30</div>
                        </div>
                        <div class="text-sm text-gray-600 truncate">
                            Bonjour, j'aimerais avoir des nouvelles...
                        </div>
                    </div>
                </div>

                <div class="conversation-item flex items-center p-4 hover:bg-gray-50 cursor-pointer border-b border-gray-100"
                    data-contact="Aminata Diallo">
                    <div class="relative mr-3">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-teal-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between mb-1">
                            <div class="font-medium text-gray-900 truncate">
                                Aminata Diallo
                            </div>
                            <div class="text-xs text-gray-500">09:45</div>
                        </div>
                        <div class="text-sm text-gray-600 truncate">
                            Merci pour l'entretien d'hier
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chat Area -->
        <div class="flex-1 flex flex-col">
            <!-- Chat Header -->
            <div class="bg-white border-b border-gray-200 p-6 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="relative mr-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="ri-user-fill text-blue-600"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div>
                        <div class="font-medium text-gray-900" id="currentContactName">
                            Alexandre Dubois
                        </div>
                        <div class="text-sm text-green-600">En ligne</div>
                    </div>
                </div>
                <div class="flex items-center space-x-3">
                    <button
                        class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg !rounded-button whitespace-nowrap">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-phone-line"></i>
                        </div>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg !rounded-button whitespace-nowrap">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-vidicon-line"></i>
                        </div>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg !rounded-button whitespace-nowrap">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-more-line"></i>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Messages Area -->
            <div class="flex-1 overflow-y-auto p-6 bg-gray-50" id="messagesContainer">
                <div class="space-y-4">
                    <!-- Received Message -->
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="ri-user-fill text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white rounded-lg p-4 shadow-sm max-w-md">
                                <p class="text-gray-800">
                                    Bonjour Monsieur William, j'espère que vous allez bien. Je
                                    vous écris concernant ma candidature pour le poste de
                                    Développeur Full Stack Senior.
                                </p>
                            </div>
                            <div class="text-xs text-gray-500 mt-1 ml-1">
                                Aujourd'hui à 14:28
                            </div>
                        </div>
                    </div>

                    <!-- Sent Message -->
                    <div class="flex items-start justify-end">
                        <div class="flex-1 flex justify-end">
                            <div class="bg-primary text-white rounded-lg p-4 shadow-sm max-w-md">
                                <p>
                                    Bonjour Alexandre, merci pour votre message. Nous avons
                                    bien reçu votre candidature et nous l'étudions
                                    actuellement.
                                </p>
                            </div>
                        </div>
                        <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center ml-3 flex-shrink-0">
                            <i class="ri-user-fill text-gray-600 text-sm"></i>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <div class="text-xs text-gray-500 mt-1 mr-1">
                            Aujourd'hui à 14:30
                        </div>
                    </div>

                    <!-- Received Message -->
                    <div class="flex items-start">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="ri-user-fill text-blue-600 text-sm"></i>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white rounded-lg p-4 shadow-sm max-w-md">
                                <p class="text-gray-800">
                                    Merci pour votre retour rapide ! Pourriez-vous me donner
                                    une estimation du délai pour la suite du processus ?
                                </p>
                            </div>
                            <div class="text-xs text-gray-500 mt-1 ml-1">
                                Aujourd'hui à 14:32
                            </div>
                        </div>
                    </div>

                    <!-- Typing Indicator -->
                    <div class="flex items-start" id="typingIndicator" style="display: none">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="ri-user-fill text-blue-600 text-sm"></i>
                        </div>
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <div class="flex space-x-1">
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"
                                    style="animation-delay: 0.1s"></div>
                                <div class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"
                                    style="animation-delay: 0.2s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Message Input -->
            <div class="bg-white border-t border-gray-200 p-6">
                <div class="flex items-end space-x-4">
                    <button
                        class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg !rounded-button whitespace-nowrap">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-attachment-line"></i>
                        </div>
                    </button>
                    <div class="flex-1 relative">
                        <textarea placeholder="Tapez votre message..."
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg resize-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                            rows="1" id="messageInput"></textarea>
                    </div>
                    <button
                        class="w-10 h-10 flex items-center justify-center text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg !rounded-button whitespace-nowrap">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-emotion-line"></i>
                        </div>
                    </button>
                    <button
                        class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-primary/90 transition-colors flex items-center !rounded-button whitespace-nowrap"
                        id="sendButton">
                        <div class="w-5 h-5 flex items-center justify-center">
                            <i class="ri-send-plane-line"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Contact Info Sidebar -->
        <div class="w-80 bg-white border-l border-gray-200 flex flex-col">
            <!-- Contact Details -->
            <div class="p-6 border-b border-gray-200 text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="ri-user-fill text-blue-600 text-2xl"></i>
                </div>
                <h3 class="font-semibold text-gray-900 mb-1" id="contactDetailName">
                    Alexandre Dubois
                </h3>
                <p class="text-sm text-gray-600 mb-2">alexandre.dubois@email.com</p>
                <div class="flex items-center justify-center text-sm text-green-600">
                    <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                    En ligne
                </div>
            </div>

            <!-- Contact Actions -->
            <div class="p-6 border-b border-gray-200">
                <div class="grid grid-cols-2 gap-3">
                    <button
                        class="flex flex-col items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
                        <div class="w-8 h-8 flex items-center justify-center mb-2">
                            <i class="ri-phone-line text-gray-600"></i>
                        </div>
                        <span class="text-xs text-gray-600">Appeler</span>
                    </button>
                    <button
                        class="flex flex-col items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
                        <div class="w-8 h-8 flex items-center justify-center mb-2">
                            <i class="ri-vidicon-line text-gray-600"></i>
                        </div>
                        <span class="text-xs text-gray-600">Vidéo</span>
                    </button>
                    <button
                        class="flex flex-col items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
                        <div class="w-8 h-8 flex items-center justify-center mb-2">
                            <i class="ri-mail-line text-gray-600"></i>
                        </div>
                        <span class="text-xs text-gray-600">Email</span>
                    </button>
                    <button
                        class="flex flex-col items-center p-3 border border-gray-300 rounded-lg hover:bg-gray-50 !rounded-button whitespace-nowrap">
                        <div class="w-8 h-8 flex items-center justify-center mb-2">
                            <i class="ri-user-add-line text-gray-600"></i>
                        </div>
                        <span class="text-xs text-gray-600">Profil</span>
                    </button>
                </div>
            </div>

            <!-- Shared Content -->
            <div class="flex-1 overflow-y-auto">
                <div class="p-6 border-b border-gray-200">
                    <h4 class="font-medium text-gray-900 mb-4">Médias partagés</h4>
                    <div class="grid grid-cols-3 gap-2">
                        <div class="aspect-square bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="ri-image-line text-gray-400"></i>
                        </div>
                        <div class="aspect-square bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="ri-file-pdf-line text-red-500"></i>
                        </div>
                        <div class="aspect-square bg-gray-100 rounded-lg flex items-center justify-center">
                            <i class="ri-file-word-line text-blue-500"></i>
                        </div>
                    </div>
                </div>

                <div class="p-6 border-b border-gray-200">
                    <h4 class="font-medium text-gray-900 mb-4">Documents</h4>
                    <div class="space-y-3">
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <div class="w-8 h-8 flex items-center justify-center mr-3">
                                <i class="ri-file-pdf-line text-red-500"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-900 truncate">
                                    CV_Alexandre_Dubois.pdf
                                </div>
                                <div class="text-xs text-gray-500">2.3 MB</div>
                            </div>
                        </div>
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <div class="w-8 h-8 flex items-center justify-center mr-3">
                                <i class="ri-file-word-line text-blue-500"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-medium text-gray-900 truncate">
                                    Lettre_Motivation.docx
                                </div>
                                <div class="text-xs text-gray-500">1.1 MB</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <h4 class="font-medium text-gray-900 mb-4">Options</h4>
                    <div class="space-y-2">
                        <button
                            class="w-full flex items-center p-3 text-left hover:bg-gray-50 rounded-lg !rounded-button whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-notification-off-line text-gray-500"></i>
                            </div>
                            <span class="text-sm text-gray-700">Couper les notifications</span>
                        </button>
                        <button
                            class="w-full flex items-center p-3 text-left hover:bg-gray-50 rounded-lg !rounded-button whitespace-nowrap">
                            <div class="w-5 h-5 flex items-center justify-center mr-3">
                                <i class="ri-delete-bin-line text-red-500"></i>
                            </div>
                            <span class="text-sm text-red-600">Supprimer la conversation</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script id="conversation-switching">
        document.addEventListener("DOMContentLoaded", function() {
            const conversationItems =
                document.querySelectorAll(".conversation-item");
            const currentContactName =
                document.getElementById("currentContactName");
            const contactDetailName = document.getElementById("contactDetailName");

            conversationItems.forEach((item) => {
                item.addEventListener("click", function() {
                    conversationItems.forEach((conv) =>
                        conv.classList.remove("bg-primary/5")
                    );
                    this.classList.add("bg-primary/5");

                    const contactName = this.dataset.contact;
                    currentContactName.textContent = contactName;
                    contactDetailName.textContent = contactName;
                });
            });
        });
    </script>

    <script id="message-functionality">
        document.addEventListener("DOMContentLoaded", function() {
            const messageInput = document.getElementById("messageInput");
            const sendButton = document.getElementById("sendButton");
            const messagesContainer = document.getElementById("messagesContainer");
            const typingIndicator = document.getElementById("typingIndicator");

            function sendMessage() {
                const messageText = messageInput.value.trim();
                if (messageText === "") return;

                const messageDiv = document.createElement("div");
                messageDiv.className = "flex items-start justify-end";
                messageDiv.innerHTML = `
                    <div class="flex-1 flex justify-end">
                        <div class="bg-primary text-white rounded-lg p-4 shadow-sm max-w-md">
                            <p>${messageText}</p>
                        </div>
                    </div>
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center ml-3 flex-shrink-0">
                        <i class="ri-user-fill text-gray-600 text-sm"></i>
                    </div>
                `;

                const timeDiv = document.createElement("div");
                timeDiv.className = "flex justify-end";
                timeDiv.innerHTML = `<div class="text-xs text-gray-500 mt-1 mr-1">Maintenant</div>`;

                const messagesArea = messagesContainer.querySelector(".space-y-4");
                messagesArea.appendChild(messageDiv);
                messagesArea.appendChild(timeDiv);

                messageInput.value = "";
                messagesContainer.scrollTop = messagesContainer.scrollHeight;

                setTimeout(() => {
                    typingIndicator.style.display = "flex";
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }, 1000);

                setTimeout(() => {
                    typingIndicator.style.display = "none";
                }, 3000);
            }

            sendButton.addEventListener("click", sendMessage);

            messageInput.addEventListener("keypress", function(e) {
                if (e.key === "Enter" && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });

            messageInput.addEventListener("input", function() {
                this.style.height = "auto";
                this.style.height = Math.min(this.scrollHeight, 120) + "px";
            });
        });
    </script>

    <script id="search-functionality">
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("contactSearch");
            const conversationItems =
                document.querySelectorAll(".conversation-item");

            searchInput.addEventListener("input", function() {
                const searchTerm = this.value.toLowerCase();

                conversationItems.forEach((item) => {
                    const contactName = item.dataset.contact.toLowerCase();
                    if (contactName.includes(searchTerm)) {
                        item.style.display = "flex";
                    } else {
                        item.style.display = "none";
                    }
                });
            });
        });
    </script>

    <script id="navigation-interactions">
        document.addEventListener("DOMContentLoaded", function() {
            const navItems = document.querySelectorAll(
                "nav .cursor-pointer, nav a"
            );
            navItems.forEach((item) => {
                item.addEventListener("click", function() {
                    if (!this.classList.contains("bg-primary/10")) {
                        navItems.forEach((nav) =>
                            nav.classList.remove("bg-primary/10", "text-primary")
                        );
                        navItems.forEach((nav) => nav.classList.add("text-gray-600"));
                        this.classList.remove("text-gray-600");
                        this.classList.add("bg-primary/10", "text-primary");
                    }
                });
            });
        });
    </script>

    <script id="button-interactions">
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll("button");
            buttons.forEach((button) => {
                button.addEventListener("mouseenter", function() {
                    if (this.classList.contains("bg-primary")) {
                        this.style.transform = "translateY(-1px)";
                    }
                });
                button.addEventListener("mouseleave", function() {
                    this.style.transform = "translateY(0)";
                });
            });
        });
    </script>
@endsection
